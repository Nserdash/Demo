<?php
require __DIR__ . '/vendor/autoload.php';

use Nik\Htdocs\Helpers\QueryBuilder;
use Nik\Htdocs\Helpers\Render;
use Nik\Htdocs\Routes\Router;
use Nik\Htdocs\Controllers\AuthController;

Router::route('/', function(){  
  $query = new QueryBuilder;
  $users = $query->selectAll('users');
  return Render::view('main',['users' => $users]);
});

Router::route('new', function(){
  print 'new станица';
});
  
Router::route('/auth', function(){
  $auth = new AuthController;
  $auth->register();    
  echo 123;
});
  
Router::execute($_SERVER['REQUEST_URI']);

?>
