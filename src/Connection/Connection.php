<?php

namespace Nik\Htdocs\Connection;
use PDO;

class Connection {
	
	public static function make() {
        $dns = (include __DIR__ .'/config.php') ['dns'];
        return new PDO('mysql:host='. $dns['host'] . ';dbname=' . $dns['dbname'], $dns['user'], $dns['password']);
    }
}