<?php
require_once 'Banco.php';

class PacientePA{
	private $conexao;

	function __construct(){
		$this->conexao=new Banco();
	}

	public function cadastrar($paciente){
		$sql="insert into paciente values(".
		$paciente->getId_paciente_pk().",'".
		$paciente->getNome()."','".
		$paciente->getTelefone()."','".
		$paciente->getEmail()."',".
		$paciente->getSenha().",'".
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

	public function listar_inicio_fim($inicio,$fim){
		$sql="select * from paciente where id_paciente_pk between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}
	public function listar(){
		$sql="select * from paciente";
		return $this->conexao->consultar($sql);
	}
	public function logar($nome,$senha)
		{
			$sql="select nome,senha from paciente";
			$consulta=$this->conexao->consultar($sql);
			if(!$consulta){
				return false;
			}else{
				$teste=false;
				while($linha=$consulta->fetch_assoc()){
					if($linha['nome']==$nome){
						if($linha['senha']==$senha){
							return true;
						}
					}
				}
				return $teste;
			}
		}
		public function retornarId($senha)
		{
			$sql="select id_paciente_pk from paciente where senha=$senha";
			return $this->conexao->consultar($sql);
		}

		public function converteIdParaNome($id)
		{
           $sql="select nome from paciente where id_paciente_pk=$id";
           return $this->conexao->consultar($sql);
		}
	}
?>