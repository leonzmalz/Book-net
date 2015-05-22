<?php
    require_once("Genero.php");

	class Livro{
		private $id;
		private $nome;
		private $Genero;
		private $permiteAluguel;
		private $foto;
		private $ISBN;
		private $editora;
		private $autor;
		private $nacionalidade;

		public function __construct(){
			$this->Genero = new Genero;		
        }

		public function setId($value){
			$this->id = $value;
		}

		public function setNome($value){
			$this->nome = $value;
		}
		public function setGenero($value){
			$this->Genero = $value;
		}
		public function setPermiteAluguel($value){
			$this->permiteAluguel = $value;
		}
		public function setFoto($value){
			$this->foto = $value;
		}
		public function setISBN($value){
			$this->ISBN = $value;
		}
		public function setEditora($value){
			$this->editora = $value;
		}
		public function setAutor($value){
			$this->autor = $value;
		}
		public function setNacionalidade($value){
			$this->nacionalidade = $value;
		}
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getGenero(){
			return $this->Genero;
		}
		public function getPermiteAluguel(){
			return $this->permiteAluguel;
		}
		public function getFoto(){
			return $this->foto;
		}
		public function getISBN(){
			return $this->ISBN;
		}
		public function getEditora(){
			return $this->editora;
		}
		public function getAutor(){
			return $this->autor;
		}
		public function getNacionalidade(){
			return $this->nacionalidade;
		}
	}
?>