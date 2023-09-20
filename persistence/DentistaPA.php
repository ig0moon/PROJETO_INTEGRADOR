<?php
	require_once 'Banco.php';

	class DentistaPA{
		private $conexao;

		function __construct(){
			$this->conexao=new Banco();
		}

	public function cadastrar($dentista){
			$sql="insert into dentista values(".
			$dentista->getId_Funcionario_Pk().",'".
			$dentista->getCpf()."','".
			$dentista->getEspecialidade()."','".
			$dentista->getNome()."','".
			$dentista->getEndereco()."',".
			$dentista->getTelefone().",'".
			$dentista->getEmail()."','".
			$dentista->getCrm()."')";


			// echo "$sql";
		return $this->conexao->executar($sql);
		}

		public function retornarUltimo(){
			$sql="select max(id_funcionario_pk) from dentista";
			$consulta=$this->conexao->consultar($sql);
			if (!$consulta){
				return false;
			} else{
				$linha=$consulta->fetch_assoc();
				$id=0;
				if($linha['max(id_funcionario_pk)']!=null){
					$id=$linha['max(id_funcionario_pk)'];
				}
				return $id;
			}
		}

		public function logar($nome,$cpf)
		{
			$sql="select nome,cpf from dentista";
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
			$sql="select id_funcionario_pk from dentista where cpf=$cpf";
			return $this->conexao->consultar($sql);
		}
		public function converteIdParaNome($id)
		{
			$sql="select nome from dentista where id_funcionario_pk=$id";
			return $this->conexao->consultar($sql);
		}
		public function listar()
		{
			$sql="select * from dentista";
			return $this->conexao->consultar($sql);
		}
	}
?>