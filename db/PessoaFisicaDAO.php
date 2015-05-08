<?php
	require_once("../model/PessoaFisica.php");
	require_once("Conexao.php");

	class PessoaFisicaDAO extends Conexao implements DAO{

		public  static function InsereValores($obj){
  			$pdo = parent::getDB();
	        $insert = $pdo->prepare("INSERT INTO pessoa_fisica
	        	                    (idUsuario,nome,identidade,cpf,dataNascimento,endereco,telefone,celular,email,homepage)
	        	                     values (?,?,?,?,?,?,?,?,?,?)");
	        $insert->bindValue(1, $obj->getUsuario()->getId());
	        $insert->bindValue(2, $obj->getNome());
	        $insert->bindValue(3, $obj->getIdentidade());
	        $insert->bindValue(4, $obj->getCpf());
	        $insert->bindValue(5, $obj->getDataNascimento());
	        $insert->bindValue(6, $obj->getEndereco());
	        $insert->bindValue(7, $obj->getTelefone());
	        $insert->bindValue(8, $obj->getCelular());
	        $insert->bindValue(9, $obj->getEmail());
	        $insert->bindValue(10, $obj->getHomePage());
            if ($insert->execute()){
                $obj->setId($pdo->lastInsertId());
                return true;
            }
            
            else
                return false;

		}

  		public static function AtualizaValores($obj){
  			$pdo = parent::getDB();
	        $update = $pdo->prepare("UPDATE pessoa_fisica SET idUsuario = ?, nome = ?, identidade = ?, cpf =?, dataNascimento = ?, 
	        	                    endereco = ?, telefone = ?, celular = ?,email = ?,homepage = ? WHERE idPessoaFisica = ?");
	        $update->bindValue(1, $obj->getUsuario()->getId());
	        $update->bindValue(2, $obj->getNome());
	        $update->bindValue(3, $obj->getIdentidade());
	        $update->bindValue(4, $obj->getCpf());
	        $update->bindValue(5, $obj->getdataNascimento());
	        $update->bindValue(6, $obj->getEndereco());
	        $update->bindValue(7, $obj->getTelefone());
	        $update->bindValue(8, $obj->getCelular());
	        $update->bindValue(9, $obj->getEmail());
	        $update->bindValue(10, $obj->getHomePage());
	        $update->bindValue(11, $obj->getId());
            if ($update->execute()){
                return true;
            }
            
            else
                return false;
			
  		}

  		public static function ExcluiValores($obj){
  			$pdo = parent::getDB();
  			$delete = $pdo-prepare("DELETE pessoa_fisica WHERE idPessoaFisica = ?");
  			$delete->bindValue(1,$obj->getId());

  			if ($delete->execute()){
                 return true;
            }
            
            else
                return false;  			

  		}
	}

?>