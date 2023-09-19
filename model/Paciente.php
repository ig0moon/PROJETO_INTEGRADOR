<?php

   class Paciente{
   	   private $id;
   	   private $nome;
   	   private $telefone;
   	   private $cpf;
   	   private $email;


   	     public function setId($id){
   	   	    $this->id=$id;
   	   }

      public function getId(){
      	return $this->id;
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
}
?>