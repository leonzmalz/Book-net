<?php
require_once("../util/bcrypt.php");
/**
* 
*/
class Usuario 
{
	private $id;
	private $user;
	private $senha;
	private $tipo;

	public function getId() {
        return $this->id;
	}
	public function setId($value){
		$this->id = $value;
	}
	public function getUser() {
        	return $this->user;
	}
	public function setUser($value){
		$this->user = $value;
	}
	public function getSenha() {
        return $this->senha;
	}
	public function setSenha($value, $isCript){
		if ($isCript)
		    $value = Bcrypt::hash($value); //Faço a criptografia 
		$this->senha = $value;
	}
	public function getTipo() {
        return $this->tipo;
	}
	public function setTipo($value){
		$this->tipo = $value;
	}

	


	
}

?>