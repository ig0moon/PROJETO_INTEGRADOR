<?php
require_once 'banco.php';

class PacientePA{
	private $conexao;

	function__construct(){
		$this->conexao=new Banco();
	}

	public function cadastrar($paciente){
		$sql="insert into paciente values(".
		$paciente->getId().",'".
		$paciente->getNome()."','".
		$paciente->getTelefone()."','".
		$paciente->getEmail()."',".
		$paciente->getCpf().")";

		return $this->conexao->executar($sql);
	}

	public function retornarUltimo(){
		$sql="select max(id) from paciente";
		$consulta=$this->conexao->consultar($sql);
		if (!$consulta){
			return false;
		}else{
			$linha=$consulta->fetch_assoc();
			$id=0;
			if ($linha['max(id)']!=null){
				$id=$linha['max(id)'];
			}
			return $id;
		}
	}

	public function listar(){
	$sql="select * from paciente";
	return $this->conexao->consultar($sql);	
	}

	public function deletar($id){
		$sql="delete from paciente where id=$id";
	}
}