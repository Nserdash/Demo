<?php

namespace Nik\Htdocs\Helpers;
use PDO;
use Nik\Htdocs\Connection\Connection;
use Nik\Htdocs\Interfaces\QueryInterface;

class QueryBuilder implements QueryInterface
{

    private $db;

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

    public function selectWhere($table, $where) 
    {           
        $statement = $this->db->query("Select * from $table where $where");
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
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

    public function update($table, $values, $id) 
    {       
        $keys = "" ;
        $allvalues = "";
        $counter = 0;

        foreach($values as $key => $value) {
            $counter++;
            ($counter != count($values)) ? $allvalues .= $key."=?," : $allvalues .= $key."=?";   
            ($key == 'password') ? $data[] = md5($value) : $data[] = $value;                     
        }
                        
        $this->db->prepare("update $table set $allvalues where id = $id")->execute($data);                      
    }

    public function customQuery(string $query) 
    {   
        $statement = $this->db->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

