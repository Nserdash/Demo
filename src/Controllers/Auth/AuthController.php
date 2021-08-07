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

        if(isset($data[0]->password) == md5(Request::one('password'))) {            
            $_SESSION['login'] = Request::one('login');                           
            Redirect::path('/');
        } else {              
            return $error = "Неправильный логин или пароль";            
        }
    }

    public function exit() 
    {
        session_destroy();
        Redirect::back();
    }

/*    public function getStatus() 
    {
        return $this->status;
    }  */

}