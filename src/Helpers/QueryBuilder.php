<?php

namespace Nik\Htdocs\Helpers;
use PDO;
use Nik\Htdocs\Connection\Connection;
use Nik\Htdocs\Interfaces\QueryInterface;

class QueryBuilder implements QueryInterface
{

    private $db;
    private static $querys = array();

    public function __construct()
    {
        $this->db = Connection::make();
    }

    public function selectAll($table) 
    {
        $statement = $this->db->query("Select * from $table");
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function select($table, $columns) 
    {           
        self::$querys["query"] = "Select $columns from $table";
        return new QueryBuilder;        
    }

    public function insert($table, $values) 
    {       
        $keys = "" ;
        $allvalues = "";
        $params = "";
        $counter = 0;

        foreach($values as $key => $value) {
            $counter++;
            ($counter != count($values)) ? $keys .= $key.',' : $keys .= $key;        
            ($counter != count($values)) ? $params .= '?, ' :  $params .= '?';
            ($key == 'password') ? $data[] = md5($value) : $data[] = $value;
        }

        $this->db->prepare("insert into $table ($keys) values ($params)")->execute($data);

    }

    public function delete($table, $id = NULL) 
    {   
        ($id) ? $this->db->query("delete from $table where id = $id") : $this->db->query("delete from $table");
        
    }

    public function update($table, $values) 
    {       
        $keys = "" ;
        $allvalues = "";
        $counter = 0;

        foreach($values as $key => $value) {
            $counter++;
            ($counter != count($values)) ? $allvalues .= $key."=?," : $allvalues .= $key."=?";   
            ($key == 'password') ? $data[] = md5($value) : $data[] = $value;                     
        }
                        
        self::$querys["query"] = "update $table set $allvalues";
        self::$querys["data"] = $data;         
        return new QueryBuilder;        
    }

    public function where($column,$operator,$value) {
        self::$querys["query"] = self::$querys["query"]." where ".$column.$operator.$value;
        return new QueryBuilder;
    }    

    public function get() {
        if(strtok(mb_strtolower(self::$querys["query"]), " ")=="select") {
            return $result = $this->db->query(self::$querys["query"])->fetchAll(PDO::FETCH_OBJ);                  
        } else {
            $this->db->prepare(self::$querys["query"])->execute(self::$querys["data"]);    
        }                
    }

    public function customQuery($query) 
    {   
        $statement = $this->db->query($query);
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}

