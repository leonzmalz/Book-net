<?php
define('__ROOT__', dirname(dirname(__FILE__))); 
abstract class Conexao{

	const USER="root";
	const PASS="";
	private static $instance = null;
	
	protected static function getInstance(){
		try{
			if(self::$instance==null){
				$dsn="mysql:host=localhost;dbname=booknet";
				$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
				self::$instance= new PDO($dsn,self::USER,self::PASS,$opcoes);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		    }	
		}catch(Exception $e){
			echo "Erro". $e->getMessage();
		}
		return self::$instance;
	
	}
	protected static function getDB(){
		return self::getInstance();
		}
}
?>
