<?php

class Banco{

	private $url;
	private $usuario;
	private $senha;
	private $banco;
	private $conexao;
 
	public function __construct(){
		$this->url="localhost";
		$this->usuario="root";
		$this->senha="";
		$this->banco="odontologia";
		$this->conexao=new mysqli($this->url,$this->usuario,
			$this->senha,$this->banco);
	}

	public function executar($sql)
	{
		$resposta=$this->conexao->query($sql);
		if(!$resposta){
			return false;
		}else{
			return true;
		}
	}

	public function consultar($sql)
	{
		$consulta=$this->conexao->query($sql);
		$linhas=$consulta->num_rows;
		if($linhas>0){
			return $consulta;
		}else{
			return false;
		}
	}
}

?>