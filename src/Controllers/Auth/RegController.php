<?php

namespace Nik\Htdocs\Controllers\Auth;
use Nik\Htdocs\Helpers\Request;
use Nik\Htdocs\Helpers\Redirect;
use Nik\Htdocs\Helpers\QueryBuilder;
use Nik\Htdocs\Helpers\Render;
use Nik\Htdocs\Routes\Router;

class RegController
{
    public function register() 
    {           
        $query = new QueryBuilder;
        $data = $query->customQuery('insert into users(password,login) select :password, :login where not exists (select 1 from users where login = :login)',[':login' => Request::one('login'),':password' => Request::one('password')]);        

        if($data->rowCount() == 0) {
            echo "Аккаунт с данным логином уже сущестует";
        } else {
            Redirect::path('/');
        }

    }
}