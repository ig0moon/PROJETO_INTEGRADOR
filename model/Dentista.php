<?php
	
	class Dentista{
		private $especialidade;
		private $nome;
		private $telefone;
		private $endereco;
		private $crm;
		private $email;
		private $cpf;
		private $id_funcionario_pk;

		public function setEspecialidade($especialidade){
			$this->especialidade=$especialidade;
		}

		public function getEspecialidade(){
			return $this->especialidade;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}

		public function getEndereco(){
			return $this->endereco;
		}
			public function setEndereco($endereco){
			$this->endereco=$endereco;
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
		public function setCpf($cpf){
			$this->cpf=$cpf;
		}

		public function getCpf(){
			return $this->cpf;
		}
		public function setId_Funcionario_Pk($id_funcionario_pk){
			$this->id_funcionario_pk=$id_funcionario_pk;
		}

		public function getId_Funcionario_Pk(){
			return $this->id_funcionario_pk;
		}
	}

?>