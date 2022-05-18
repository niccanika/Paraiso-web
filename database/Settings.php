<?php

class Settings
{
    const SERVERPORT = "3306";
    const SERVERNAME = "localhost:".self::SERVERPORT;
    const DBNAME = "paraiso";
    const USERNAME = "root";
    const PASSWORD = "";

    public static function getPDO(): PDO {
        $pdo = new PDO(
            "mysql:host=".self::SERVERNAME.";dbname=".self::DBNAME,
            self::USERNAME,
            self::PASSWORD
        );

        return $pdo;
    }
}

