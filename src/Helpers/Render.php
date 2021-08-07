<?php

namespace Nik\Htdocs\Helpers;

class Render 
{

    public static function view($__view, $__data = NULL)
    {       
        if($__data) extract($__data);

        ob_start();
        
        require "view/".$__view.".php";

        $output = ob_get_clean();

        echo $output;        

    }
    
}
