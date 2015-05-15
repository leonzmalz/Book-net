<?php
require_once (realpath(dirname(__FILE__) . '/../model/usuario.php'));
	require_once("Conexao.php");
	require_once("DAO.php");

	class UsuarioDAO extends Conexao implements DAO{


		public  static function InsereValores($obj){
		    $pdo = parent::getDB();
	    	$insert = $pdo->prepare("INSERT INTO usuarios(user,senha,tipo) values (?,?,?)");
	        $insert->bindValue(1, $obj->getUser());
	        $insert->bindValue(2, $obj->getSenha());
	        $insert->bindValue(3, $obj->getTipo());
            if ($insert->execute()){
                $obj->setId($pdo->lastInsertId());
                return true;
            }
            
            else
                return false;
        
        }       


  		public static function AtualizaValores($obj){
			$pdo = parent::getDB();                           //Não atualizamos o tipo, pois ele nunca irá mudar
        	$update = $pdo->prepare("UPDATE usuarios set user = ?, senha = ? WHERE idUsuario = ?"); 
         	$update->bindValue(1,$obj->getuser()); 
         	$update->bindValue(2,$obj->getSenha());
         	$update->bindValue(3,$obj->getId());
         
         	if($update->execute())
            	return true;
         	else
            	return false;  
			
  		}

  		public static function ExcluiValores($obj){
			$pdo = parent::getDB();
		    $delete = $pdo->prepare("DELETE FROM usuarios where idUsuario = ?");
		    $delete->bindValue(1, $obj->getId());
		    if ($delete->execute())
		           return true;
		        else
		           return false;


  		}
  		public static function ValidarUsuario($obj){
	        $pdo = parent ::getDB();
	        $select = $pdo->prepare("SELECT * FROM usuarios WHERE user = ?");
	        $select->bindValue(1,$obj->getUser());
	        $select->execute();

	        if (count($select->fetchAll(PDO::FETCH_ASSOC)) > 0) //Se existe registros, retorno false
	            return false;
	        else
	            return true;
      }

      public static function getUsuarioByLogin($obj){
      	    $pdo = parent ::getDB();
	        $select = $pdo->prepare("SELECT * FROM usuarios WHERE user = ?");
	        $select->bindValue(1,$obj->getUser());
	        $select->execute();
	        $registro = $select->fetch(PDO::FETCH_ASSOC);
          
            $obj = new Usuario;
            $obj->setId($registro['idUsuario']);
            $obj->setUser($registro['user']);
            $obj->setSenha($registro['senha'],false); //Já vem criptografada do banco, por isso passo false
            $obj->setTipo($registro['tipo']);
        	return $obj;
      }

  		
	}

?>