<?php

namespace Nik\Htdocs\Controllers;
use Nik\Htdocs\Helpers\Request;
use Nik\Htdocs\Helpers\QueryBuilder;

class AuthController
{
    public function register() 
    {   
        $query = new QueryBuilder;
        $query->update('users', Request::all(["id"]),Request::one('id'));        
    }
}