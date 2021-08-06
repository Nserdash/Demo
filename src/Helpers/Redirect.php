<?php

namespace Nik\Htdocs\Helpers;
use Nik\Htdocs\Routes\Router;

class Redirect 
{

    public static function path($path)
    {       
        header("Location: $path");
    }

    public static function back()
    {       
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    
}
