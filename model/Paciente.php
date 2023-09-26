<?php

  class Paciente{
   	private $id_paciente_pk;
   	private $nome;
   	private $telefone;
    private $senha;
   	private $cpf;
   	private $email;
    private $endereco;

    public function setId_paciente_pk($id_paciente_pk){
   	  $this->id_paciente_pk=$id_paciente_pk;
   	}
    public function getId_paciente_pk(){
      return $this->id_paciente_pk;
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

      public function setSenha($senha){
        $this->senha=$senha;
      }

      public function getSenha(){
        return $this->senha;
      }

      public function setCpf($cpf){
   	   	  $this->cpf=$cpf;
   	   }

      public function getCpf(){
      	return $this->cpf;
      }

      public function setEmail($email){
   	   	$this->email=$email;
   	  }

      public function getEmail(){
      	return $this->email;
      }

      public function setEndereco($endereco){
        $this->endereco=$endereco;
      }

      public function getEndereco(){
        return $this->endereco; 
      }
}
?>