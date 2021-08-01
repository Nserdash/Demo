<?php

namespace Nik\Htdocs\Helpers;

class PostData 
{

    public static function all()
    {       
        array_pop($_POST);

        foreach ($_POST as $key => $value) {
            ($key == 'password') ? $add[$key] = md5($value) : $add[$key] = $value;
        }    
            
        return $add;    
    }
    
    public static function input($name) {
        $post = $_POST[$name];
        return $post;
    }
}
