<?php
use Nik\Htdocs\Routes\Router;
use Nik\Htdocs\Helpers\QueryBuilder;
use Nik\Htdocs\Controllers\Auth\RegController;
use Nik\Htdocs\Controllers\UsersController;

Router::route('/', function(){ 
$user = new UsersController; 
$user->allData();
});

Router::route('new', function(){
print 'new станица';
});

Router::route('/reg', function(){
$auth = new RegController;
$auth->register();      
});

Router::execute($_SERVER['REQUEST_URI']);
  