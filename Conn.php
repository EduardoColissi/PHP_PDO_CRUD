<?php

class Conn
{
    public static $Host = "localhost";
    public static $User = "root";
    public static $Pass = "";
    public static $Dbname = "pdo_crud";
    private static $Connect = null;

    private static function Conectar()
    {
        self::$Connect = new PDO('mysql:host=' . self::$Host . ';dbname=' . self::$Dbname, self::$User, self::$Pass);
        return self::$Connect;
    }

    public function getConn()
    {
        self::Conectar();
    }
}
