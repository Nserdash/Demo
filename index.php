<?php

//declare(strict_types=1);

use Nik\Htdocs\Connection\Connection;
use Nik\Htdocs\Helpers\QueryBuilder;

require __DIR__ . '/vendor/autoload.php';

$query = new QueryBuilder();

//$query->insert('users',['password' => '122223', 'login' => 'Имя']);

//$query->delete('users');

//$query->update('users',['password' => '1111', 'login' => 'ser'], 11);

//$result = $query->selectAll('users');

$id = 11; 
$result = $query->selectWhere('users',"id = $id");

foreach($result as $res) {
    echo $res->login;
}