<?php

namespace Models;

use PDO;
use PDOException;

class DB
{
    public static $db;

    public static function init()
    {
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'nuke';
        try{
            self::$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        }catch(PDOException $e) {
            view('connectionerror');
            die();
        }
        
    }

    public static function start($callback)
    {
        self::init();
        return $callback(self::$db);
    }
}
