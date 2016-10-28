<?php

class ConexaoI {

    public function __construct() {
        
    }

    public static function conectar() {
        mysql_connect("local", "usuario", "senha") or die(mysql_error()); // conexao com o banco usuario, senha, local hospedado
        mysql_select_db("nome do banco") or die(mysql_error()); // nome do banco de dados
    }

    public static function desconectar() {
        mysql_close(); // desconectar
    }

}

?>