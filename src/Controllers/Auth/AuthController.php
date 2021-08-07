<?php

namespace Nik\Htdocs\Controllers\Auth;
use Nik\Htdocs\Helpers\Request;
use Nik\Htdocs\Helpers\Redirect;
use Nik\Htdocs\Helpers\QueryBuilder;

class AuthController
{
    public function auth() 
    {           
        $query = new QueryBuilder;
        
        $data = $query->select('users')
        ->where('login','=',Request::one('login'))
        ->where('password','=',md5(Request::one('password')))
        ->get();

        if($data[0]->password == md5(Request::one('password'))) {
            session_start();
            $_SESSION['login'] = Request::one('login');            
        } else {
            echo "Неправильный логин или пароль";
        }
    }

    public function exit() 
    {
        session_destroy();
        Redirect::back();
    }
}