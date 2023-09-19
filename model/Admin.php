<?php

   class Admin{
   	   private $id;
   	   private $nome;
   	   private $telefone;
   	   private $senha;
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
            public function setSenha($senha){
   	   	    $this->senha=$senha;
   	   }

      public function getSenha(){
      	return $this->senha;
      }
          public function setEmail($email){
   	   	    $this->email=$email;
   	   }

      public function getEmail(){
      	return $this->email; 
}
}
?>