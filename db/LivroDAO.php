<?php
    require_once ("Conexao.php");
    require_once (realpath(dirname(__FILE__) . '/../model/livro.php'));
    require_once ("DAO.php");

    class LivroDAO extends Conexao implements DAO{

  		public static function InsereValores($obj){
		    $pdo = parent::getDB();
        $insert = $pdo->prepare("INSERT INTO livros(nome,idGenero,permiteAluguel,foto,ISBN,editora,autor,nacionalidade) values (?,?,?,?,?,?,?,?)");
        $insert->bindValue(1, $obj->getNome());
        $insert->bindValue(2, $obj->getGenero()->getId());
        $insert->bindValue(3, $obj->getPermiteAluguel());
        $insert->bindValue(4, $obj->getFoto());
        $insert->bindValue(5, $obj->getISBN());
        $insert->bindValue(6, $obj->getEditora());
        $insert->bindValue(7, $obj->getAutor());
        $insert->bindValue(8, $obj->getNacionalidade());
        if ($insert->execute())
             return true;
        else
             return false;
         
  		}
  		public static function AtualizaValores($obj){
        $pdo = parent::getDB();
        $update = $pdo->prepare("UPDATE livros set nome = ?, idGenero = ?, permiteAluguel = ?, foto = ?, ISBN = ?, editora =?, editora = ?, autor = ?, nacionalidade = ? WHERE idLivro = ?");
        $update->bindValue(1, $obj->getNome());
        $update->bindValue(2, $obj->getGenero()->getId());
        $update->bindValue(3, $obj->getPermiteAluguel());
        $update->bindValue(4, $obj->getFoto());
        $update->bindValue(5, $obj->getISBN());
        $update->bindValue(6, $obj->getEditora());
        $update->bindValue(7, $obj->getAutor());
        $update->bindValue(8, $obj->getNacionalidade());
        $update->bindValue(9, $obj->getId());

         if($update->execute())
            return true;
         else
            return false;         
  		}

  		public static function ExcluiValores($obj){
        $pdo = parent::getDB();
        $delete = $pdo->prepare("DELETE FROM livros WHERE idLivro = ?");
        $delete->bindValue(1,$obj->getId());
        if($delete->execute())
          return true;
        else
          return false;

  		}
  		#Retorna um array de objetos com os valores do banco
  		public static function getLivros(){

  			$pdo = parent::getDB();
  			$select = $pdo->query("SELECT * FROM livros ORDER BY nome");
  			$arrayResult = array();

  			foreach ($select as $registro){
  				$livro = new Livro;
          $livro->setId($registro['idLivro']);
          $genero = $livro->getGenero();
          $genero->setId($registro['idGenero']);
          $livro->setNome($registro['nome']);
          $livro->setPermiteAluguel($registro['permiteAluguel']);
          $livro->setFoto($registro['foto']);
          $livro->setISBN($registro['ISBN']);
          $livro->setEditora($registro['editora']);
          $livro->setAutor($registro['autor']);
          $livro->setNacionalidade($registro['nacionalidade']);

  				array_push($arrayResult,$livro);
  			}
  			return $arrayResult;

  		}

      public static function getLivroById($id){
        $pdo = parent::getDB();
        $select = $pdo->prepare("SELECT * FROM livros WHERE idLivro = ?");
        $select->bindValue(1,$id);
        $select->execute();

        $registro = $select->fetch(PDO::FETCH_ASSOC);
          
        $livro = new Livro;
        $livro->setId($id);
        $livro->getGenero->setIdGenero($registro['idGenero']);
        $livro->setNome($registro['nome']);
        $livro->setPermiteAluguel($registro['permiteAluguel']);
        $livro->setFoto($registro['foto']);
        $livro->setISBN($registro['ISBN']);
        $livro->setEditora($registro['editora']);
        $livro->setAutor($registro['autor']);
        $livro->setNacionalidade($registro['nacionalidade']);

        return $livro;
      }

      public static function getLivroByNome($nome){
        $pdo = parent::getDB();
        $select = $pdo->prepare("SELECT * FROM livros WHERE nome LIKE ?  ORDER BY nome");
        $select->bindValue(1,'%'.$nome.'%');
        $select->execute();
        $arrayResult = array();
        
        foreach($select as $registro){  
          $livro = new Livro;
          $livro->setId($registro['idLivro']);
          $livro->getGenero->setIdGenero($registro['idGenero']);
          $livro->setNome($registro['nome']);
          $livro->setPermiteAluguel($registro['permiteAluguel']);
          $livro->setFoto($registro['foto']);
          $livro->setISBN($registro['ISBN']);
          $livro->setEditora($registro['editora']);
          $livro->setAutor($registro['autor']);
          $livro->setNacionalidade($registro['nacionalidade']);

          array_push($arrayResult,$livro);
        }
        return $arrayResult;
      }

      public static function getLivroByGenero($idGenero){
        $pdo = parent::getDB();
        $select = $pdo->prepare("SELECT * FROM livros WHERE idGenero = ?");
        $select->bindValue(1,$idGenero);
        $select->execute();
        
        $arrayResult = array();
        
        foreach($select as $livro){ 
          $livro = new Livro;
          $livro->setId($registro['idLivro']);
          $livro->getGenero->setIdGenero($registro['idGenero']);
          $livro->setNome($registro['nome']);
          $livro->setPermiteAluguel($registro['permiteAluguel']);
          $livro->setFoto($registro['foto']);
          $livro->setISBN($registro['ISBN']);
          $livro->setEditora($registro['editora']);
          $livro->setAutor($registro['autor']);
          $livro->setNacionalidade($registro['nacionalidade']);
          
          array_push($arrayResult,$obj);
        }
        return $arrayResult;
      }


     }

?>