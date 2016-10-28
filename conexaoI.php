<?php

class ConexaoI {

    public function __construct() {
        
    }

    public static function conectar() {
        mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("gerenciador") or die(mysql_error());
    }

    public static function disconectar() {
        mysql_close();
    }

}

?>