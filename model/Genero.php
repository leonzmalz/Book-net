<?php

	class Genero{
		private $id;
		private $nome;

		public function setId($value){
			$this->id = $value;
		}

		public function setNome($value){
			$this->nome = $value;
		}

		public function getId(){
			return $this->id;
		}

		public function getNome(){
			return $this->nome;
		}
	}
?>