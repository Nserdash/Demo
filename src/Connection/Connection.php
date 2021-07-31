<?php

namespace Nik\Htdocs\Connection;
use PDO;

class Connection {
	
	public static function make() {
        return new PDO("mysql:host=localhost;dbname=HelpDesc", 'root', 'ger1976ser1999');
    }
}