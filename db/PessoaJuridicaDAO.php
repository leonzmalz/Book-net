<?php
    require_once("../model/PessoaJuridica.php");
	require_once("Conexao.php");

	class PessoaJuridicaDAO extends Conexao implements DAO{

		public static function InsereValores($obj){
  			$pdo = parent::getDB();
	        $insert = $pdo->prepare("INSERT INTO pessoa_juridica
	        	                    (idUsuario,CNPJ,razaoSocial,endereco,telefone,celular,email,homepage)
	        	                     values (?,?,?,?,?,?,?,?)");
	        $insert->bindValue(1, $obj->getUsuario()->getId());
	        $insert->bindValue(2, $obj->getCnpj());
	        $insert->bindValue(3, $obj->getRazaoSocial());
	        $insert->bindValue(4, $obj->getEndereco());
	        $insert->bindValue(5, $obj->getTelefone());
	        $insert->bindValue(6, $obj->getCelular());
	        $insert->bindValue(7, $obj->getEmail());
	        $insert->bindValue(8, $obj->getHomePage());
            if ($insert->execute()){
                $obj->setId($pdo->lastInsertId());
                return true;
            }
            
            else
                return false;

		}

  		public static function AtualizaValores($obj){
  			$pdo = parent::getDB();
	        $update = $pdo->prepare("UPDATE pessoa_juridica SET idUsuario = ?, CNPJ = ?, razaoSocial = ?, endereco = ?,
	        	                    telefone = ?, celular = ?,email = ?,homepage = ? WHERE idPessoaFisica = ?");
	        $update->bindValue(1, $obj->getUsuario()->getId());
	        $update->bindValue(2, $obj->getCnpj());
	        $update->bindValue(3, $obj->getRazaoSocial());
	        $update->bindValue(4, $obj->getEndereco());
	        $update->bindValue(5, $obj->getTelefone());
	        $update->bindValue(6, $obj->getCelular());
	        $update->bindValue(7, $obj->getEmail());
	        $update->bindValue(8, $obj->getHomePage());
	        $update->bindValue(9, $obj->getId());
            if ($update->execute()){
                return true;
            }
            
            else
                return false;
  			
			
  		}

  		public static function ExcluiValores($obj){
  			$pdo = parent::getDB();
  			$delete = $pdo-prepare("DELETE pessoa_juridica WHERE idPessoaJuridica = ?");
  			$delete->bindValue(1,$obj->getId());

  			if ($delete->execute()){
                 return true;
            }
            
            else
                return false; 			

  		}
	}
?>