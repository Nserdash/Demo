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
    
}
