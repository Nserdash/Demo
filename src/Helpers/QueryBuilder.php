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
        $stmt = $this->db->query("Select * from $table");        
        return $stmt->fetchAll(PDO::FETCH_OBJ);        
    }

    public function select($table, $columns = "*") 
    {           
        self::$querys["query"] = "Select $columns from $table";
        return new QueryBuilder;        
    }

    public function insert($table, array $values) 
    {       
        $keys = "" ;
        $allvalues = "";
        $params = "";
        $counter = 0;

        foreach($values as $key => $value) {
            $counter++;
            ($counter != count($values)) ? $keys .= $key.',' : $keys .= $key;        
            ($counter != count($values)) ? $params .= '?, ' :  $params .= '?';
            $data[] = $value;
        }

        self::$querys["query"] = "insert into $table ($keys) values ($params)";
        self::$querys["data"] = $data;
        return new QueryBuilder;

    }

    public function delete($table, $id = NULL) 
    {   
        ($id) ? $this->db->query("delete from $table where id = $id") : $this->db->query("delete from $table");
        
    }

    public function update($table, array $values) 
    {       
        $keys = "" ;
        $allvalues = "";
        $counter = 0;

        foreach($values as $key => $value) {
            $counter++;
            ($counter != count($values)) ? $allvalues .= $key."=?," : $allvalues .= $key."=?";   
            $data[] = $value;                     
        }
                        
        self::$querys["query"] = "update $table set $allvalues";
        self::$querys["data"] = $data;         
        return new QueryBuilder;        
    }

    public function where($column,$operator,$value) {    //

        if(strpos(self::$querys["query"], 'where')) {
            self::$querys["query"] = self::$querys["query"]." and ".$column.$operator."?";                                                                               
            array_push(self::$querys["data"], $value);                         
        } else {
            self::$querys["query"] = self::$querys["query"]." where ".$column.$operator."?";            
            self::$querys["data"][] = $value;                         
        }                       

        return new QueryBuilder;
    }    

    public function get() {                
        $stmt = $this->db->prepare(self::$querys["query"]);        
        $stmt->execute(self::$querys["data"]);                     
        return $stmt->fetchAll(PDO::FETCH_OBJ);;
    }

    public function customQuery($query, array $data) 
    {       
        $stmt = $this->db->prepare($query);        
        $stmt->execute($data);               
        return $stmt;
    }

}

