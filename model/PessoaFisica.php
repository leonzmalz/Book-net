<?php
require_once("Pessoa.php");
/**
* 
*/
	class PessoaFisica extends Pessoa
	{
		private $nome;
		private $dataNascimento;
		private $cpf;
		private $identidade;

		public function getNome() {
        	return $this->nome;
    	}
    	public function setNome($value){
    		$this->nome = $value;
    	}
    	public function getDataNascimento() {
        	return $this->dataNascimento;
    	}
    	public function setDataNascimento($value){
    		$this->dataNascimento = $value;
    	}
    	public function getCpf() {
        	return $this->cpf;
    	}
    	public function setCPF($value){
    		$this->cpf = $value;
    	}
    	public function getIdentidade() {
        	return $this->identidade;
    	}
    	public function setIdentidade($value){
    		$this->identidade = $value;
    	}

	}
 ?>