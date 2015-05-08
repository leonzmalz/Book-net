<?php
    require_once("../model/Genero.php");
    require_once("Conexao.php");
    require_once("DAO.php");

    class GeneroDAO extends Conexao implements DAO{

  		public static function InsereValores($obj){
		    $pdo = parent::getDB();
        $insert = $pdo->prepare("INSERT INTO generos(nome) values (?)");
        $insert->bindValue(1, $obj->getNome());
          if ($insert->execute())
               return true;
          else
               return false;
         
  		}
  		public static function AtualizaValores($obj){
         $pdo = parent::getDB();
         $update = $pdo->prepare("UPDATE generos set nome = ? WHERE idGenero = ?");
         $update->bindValue(1,$obj->getNome()); 
         $update->bindValue(2,$obj->getId());

         if($update->execute())
            return true;
         else
            return false;         
  		}

  		public static function ExcluiValores($obj){
        $pdo = parent::getDB();
        $delete = $pdo->prepare("DELETE FROM generos WHERE idGenero = ?");
        $delete->bindValue(1,$obj->getId());
        if($delete->execute())
          return true;
        else
          return false;

  		}
  		#Retorna um array de objetos com os valores do banco
  		public static function getValores(){

  			$pdo = parent::getDB();
  			$select = $pdo->query("SELECT * FROM generos ORDER BY nome");
  			$arrayResult = array();

  			foreach ($select as $registro){
  				$genero = new Genero;
  				$genero->setId($registro['idGenero']);
  				$genero->setNome($registro['nome']);

  				array_push($arrayResult,$genero);
  			}
  			return $arrayResult;

  		}

      public static function ValidarNome($obj){
        $pdo = parent ::getDB();
        $select = $pdo->prepare("SELECT idGenero FROM genero WHERE nome = ?");
        $select->bindValue(1,$obj->getNome());
        $select->execute();

        if (count($select->fetchAll(PDO::FETCH_ASSOC)) > 0) //Se existe registros
            return true;
        else
            return false;
      }
  		


     }

?>