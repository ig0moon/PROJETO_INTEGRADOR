<?php
require_once 'Banco.php';

class PacientePA{
	private $conexao;

	function __construct(){
		$this->conexao=new Banco();
	}

	public function cadastrar($paciente){
		$sql="insert into paciente values(".
		$paciente->getId().",'".
		$paciente->getNome()."','".
		$paciente->getTelefone()."','".
		$paciente->getEmail()."',".
		$paciente->getCpf().",'".
		$paciente->getEndereco()."')";
		
		

		return $this->conexao->executar($sql);
	}

	public function retornarUltimo(){
		$sql="select max(id_paciente_pk) from paciente";
		$consulta=$this->conexao->consultar($sql);
		if (!$consulta){
			return false;
		}else{
			$linha=$consulta->fetch_assoc();
			$id=0;
			if ($linha['max(id_paciente_pk)']!=null){
				$id=$linha['max(id_paciente_pk)'];
			}
			return $id;
		}
	}

	public function listar($inicio,$fim){
		// code...
	}

	

	public function logar($nome,$cpf)
		{
			$sql="select nome,cpf from paciente";
			$consulta=$this->conexao->consultar($sql);
			if(!$consulta){
				return false;
			}else{
				$teste=false;
				while($linha=$consulta->fetch_assoc()){
					if($linha['nome']==$nome){
						if($linha['cpf']==$cpf){
							return true;
						}
					}
				}
				return $teste;
			}
		}
		public function retornarId($cpf)
		{
			$sql="select id from paciente where cpf=$cpf";
			return $this->conexao->consultar($sql);
		}

		public function converteIdParaNome($id)
		{
           $sql="select nome from paciente where id=$id";
           return $this->conexao->consultar($sql);
		}
	}
?>