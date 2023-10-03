<?php
	require_once 'Banco.php';

	class AdminPA{
		private $conexao;

		function __construct(){
			$this->conexao=new Banco();
		}

	public function cadastrar($admin){
			$sql="insert into admin values(".
			$cliente->getId().",'".
			$cliente->getNome()."',".
			$cliente->getTelefone().",'".
			$cliente->getSenha()."','".
			$cliente->getEmail()."')";


			// echo "$sql";
		return $this->conexao->executar($sql);
		}

		public function retornarUltimo(){
			$sql="select max(id) from admin";
			$consulta=$this->conexao->consultar($sql);
			if (!$consulta){
				return false;
			} else{
				$linha=$consulta->fetch_assoc();
				$id=0;
				if($linha['max(id)']!=null){
					$id=$linha['max(id)'];
				}
				return $id;
			}
		}

		public function logar($nome,$senha)
		{
			$sql="select nome,senha from admin";
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
		public function retornarId($nome)
		{
			$sql="select id from admin where nome=$nome";
			return $this->conexao->consultar($sql);
		}
		public function converteIdParaNome($id)
		{
			$sql="select nome from admin where id=$id";
			return $this->conexao->consultar($sql);
		}

		public function drop($drop)
		{
			$sql="drop database odontologia";
			return $this->conexao->executar($sql);
		}
	}
?>