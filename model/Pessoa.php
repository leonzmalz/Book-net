<?php
require_once("Usuario.php");
	abstract class Pessoa{
		protected $id;
		protected $endereco;
		protected $telefone;
		protected $celular;
		protected $email;
		protected $homepage;
		protected $Usuario;

		public function __construct($user,$senha){
			$this->Usuario = new Usuario;
			$this->Usuario->setUser($user);
			$this->Usuario->setSenha($senha);
		}
		public function getId() {
        	return $this->id;
    	}
    	public function setId($value){
    		$this->id = $value;
    	}

        public function getUsuario(){
            return $this->Usuario;
        }

		public function getEndereco() {
        	return $this->endereco;
    	}
        
    	public function setEndereco($value){
    		$this->endereco = $value;
    	}
    	public function getTelefone() {
        	return $this->telefone;
    	}
    	public function setTelefone($value){
    		$this->telefone = $value;
    	}
    	public function getCelular() {
        	return $this->celular;
    	}
    	public function setCelular($value){
    		$this->celular = $value;
    	}
    	public function getEmail() {
        	return $this->email;
    	}
    	public function setEmail($value){
    		$this->email = $value;
    	}
    	public function getHomePage() {
        	return $this->homepage;
    	}
    	public function setHomePage($value){
    		$this->homepage = $value;
    	}


	
	}
	

?>