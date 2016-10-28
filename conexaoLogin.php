<?php
class Conexao 
{
	private static $db = 'login_teste' ; 
	private static $host = 'localhost' ;
	private static $user = 'root';
	private static $pass = '';
	
	private static $cont  = null;
	
	public function __construct() {
		
	}
	
	public static function conectar()
	{

       if ( null == self::$cont )
       {      
        try 
        {
          self::$cont =  new PDO( "mysql:host=".self::$host.";"."dbname=".self::$db, self::$user, self::$pass);  
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
	}
	
	public static function disconectar()
	{
		self::$cont = null;
	}
}
?>