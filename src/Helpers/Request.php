<?php

namespace Nik\Htdocs\Helpers;
use Nik\Htdocs\Interfaces\RequestInterface;

class Request implements RequestInterface
{

    public static function all($exceptions = NULL)
    {       
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            array_pop($_POST);

            if($exceptions) {
    
                foreach ($_POST as $key => $value) {                
                    if(!in_array($key, $exceptions)) {
                        $add[$key] = $value;
                    }
                }                
    
            } else {
                
                foreach ($_POST as $key => $value) {
                    $add[$key] = $value;
                }    
        
            }
    
        } elseif($_SERVER['REQUEST_METHOD'] === 'GET') {

            foreach ($_GET as $key => $value) {                                
                $add[$key] = $value;                
            }                
        
        }
                
        return $add;    
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
