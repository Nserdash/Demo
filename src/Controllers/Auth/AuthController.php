<?php

namespace Nik\Htdocs\Controllers\Auth;
use Nik\Htdocs\Helpers\Request;
use Nik\Htdocs\Helpers\QueryBuilder;

class AuthController
{
    public function auth() 
    {           
        $query = new QueryBuilder;
//      $data = $query->selectAll("users")->where("login","=",Request::one('login'))->get();        

    }
}