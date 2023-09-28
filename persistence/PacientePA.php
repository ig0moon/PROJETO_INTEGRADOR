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
		$paciente->getEmail()."','".
		$paciente->getSenha()."',".
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
		public function retornarId($cpf)
		{
			$sql="select id_paciente_pk from paciente where cpf=$cpf";
			return $this->conexao->consultar($sql);
		}

		public function converteIdParaNome($id)
		{
           $sql="select nome from paciente where id_paciente_pk=$id";
           return $this->conexao->consultar($sql);
		}

		public function buscarPorId($idbsc){
			$sql="select * from paciente where id_paciente_pk=$idbsc";
			return $this->conexao->consultar($sql);
		}

		public function buscar($busca){
			$sql="select * from paciente where id_paciente_pk='$busca' or nome like '%$busca%' or telefone like '%$busca%' or email like '%$busca%' or cpf like '%$busca%' or endereco like '%$busca%'";
			return $this->conexao->consultar($sql);
		}

		public function alterar($paciente){
			$sql="update paciente set nome='".$paciente->getNome()."', telefone='".$paciente->getTelefone()."', email='".$paciente->getEmail()."', senha='".$paciente->getSenha()."', endereco='".$paciente->getEndereco()."' where id_paciente_pk=".$paciente->getId_paciente_pk();
			return $this->conexao->executar($sql);
		}
		public function buscaPorResultado($id)	
		{
		$sql = "select id_examen_pk,resultado from exame where id_paciente_fk=$id";
		return $this->conexao->consultar($sql);
	}
	public function converteSenhaParaId($senha)
		{
			$sql="select id_paciente_pk from paciente where senha='$senha'";
			return $this->conexao->consultar($sql);
		}
	}
?>