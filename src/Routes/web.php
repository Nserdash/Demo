<?php
use Nik\Htdocs\Routes\Router;
use Nik\Htdocs\Helpers\QueryBuilder;
use Nik\Htdocs\Controllers\Auth\RegController;
use Nik\Htdocs\Controllers\Auth\AuthController;
use Nik\Htdocs\Controllers\UsersController;
use Nik\Htdocs\Helpers\Render;

if(isset($_SESSION['login'])) {

    Router::route('/', function(){ 
        $user = new UsersController; 
        $user->allData();
        });
    
}

Router::route('/new', function(){
$auth = new AuthController;
$auth->auth();          
});

Router::route('/reg', function(){
$auth = new RegController;
$auth->register();      
});

Router::route('/exit', function(){
$auth = new AuthController;
$auth->exit();      
});
    
Router::execute($_SERVER['REQUEST_URI']);


  