<?php
	class PessoaJuridica extends Pessoa{
		private $razaoSocial;
		private $cnpj;

		public function getRazaoSocial() {
        	return $this->razaoSocial;
    	}
    	public function setRazaoSocial($value){
    		$this->razaoSocial = $value;
    	}
    	public function getCnpj() {
        	return $this->cnpj;
    	}
    	public function setCnpj($value){
    		$this->cnpj = $value;
    	}
	}
?>