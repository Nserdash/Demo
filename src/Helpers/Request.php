<?php

namespace Nik\Htdocs\Helpers;
use Nik\Htdocs\Interfaces\RequestInterface;

class Request implements RequestInterface
{

    public static function all()
    {       
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            array_pop($_POST);
                
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }    
            
        } elseif($_SERVER['REQUEST_METHOD'] === 'GET') {

            foreach ($_GET as $key => $value) {                                
                $data[$key] = $value;                
            }                
        
        }
                
        return $data;    
    }
    
    public static function one($name) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST[$name];
        } elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $_GET[$name];
        }

        return $data;
    }
}
