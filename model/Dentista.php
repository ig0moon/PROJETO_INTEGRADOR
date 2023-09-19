<?php
	
	class Dentista{
		private $especialidade;
		private $nome;
		private $telefone;
		private $crm;
		private $email;

		public function setEspecialidade($especialidade){
			$this->especialidade=$especialidade;
		}

		public function getEspecialidade(){
			return $this->especialidade;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function setCrm($crm){
			$this->crm=$crm;
		}

		public function getCrm(){
			return $this->crm;
		}
		public function setEmail($email){
			$this->email=$email;
		}

		public function getEmail(){
			return $this->email;
		}
	}

?>