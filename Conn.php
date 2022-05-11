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
        try {
            if (self::$Connect == null) :
                self::$Connect = new PDO('mysql:host=' . self::$Host . ';dbname=' . self::$Dbname, self::$User, self::$Pass);
                return self::$Connect;
            endif;
        } catch (Exception $ex) {
            echo 'Mensagem' . $ex->getMessage();
            die;
        }
    }

    public function getConn()
    {
        return self::Conectar();
    }
}
