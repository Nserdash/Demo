<?php

namespace Nik\Htdocs\Controllers;
use Nik\Htdocs\Helpers\PostData;
use Nik\Htdocs\Helpers\QueryBuilder;
use Nik\Htdocs\Helpers\Render;

class UsersController
{
    public function allData() 
    {
        $query = new QueryBuilder;
        $users = $query->customQuery("Select * from users");
        return Render::view('main',['users' => $users]);
    
    }
}