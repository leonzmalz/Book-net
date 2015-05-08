<?php
	require_once("../model/usuario.php");
	require_once("Conexao.php");
	require_once("DAO.php");

	class UsuarioDAO extends Conexao implements DAO{

		public  static function InsereValores($obj){
		    $pdo = parent::getDB();
	        $insert = $pdo->prepare("INSERT INTO usuarios(user,senha) values (?,?)");
	        $insert->bindValue(1, $obj->getUser());
	        $insert->bindValue(2, $obj->getSenha());
            if ($insert->execute()){
                $obj->setId($pdo->lastInsertId());
                return true;
            }
            
            else
                return false;
        }       



  		public static function AtualizaValores($obj){
			$pdo = parent::getDB();
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
	}

?>