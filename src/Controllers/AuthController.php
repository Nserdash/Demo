<?php

namespace Nik\Htdocs\Controllers;
use Nik\Htdocs\Helpers\PostData;
use Nik\Htdocs\Helpers\QueryBuilder;

class AuthController
{
    public function register() 
    {   
        $query = new QueryBuilder;
        $query->insert('users', PostData::all());        
    }
}