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

		public function logar($nome,$crm)
		{
			$sql="select nome,crm from dentista";
			$consulta=$this->conexao->consultar($sql);
			if(!$consulta){
				return false;
			}else{
				$teste=false;
				while($linha=$consulta->fetch_assoc()){
					if($linha['nome']==$nome){
						if($linha['crm']==$crm){
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

		public function buscar($busca){
			$sql="select * from dentista where id_funcionario_pk='$busca' or cpf like '%$busca%' or especialidade like '%$busca%' or nome like '%$busca%' or endereco like '%$busca%' or telefone like '%$busca%' or email like '%$busca%'";
			return $this->conexao->consultar($sql);
		}

		public function alterar($dentista,$tipo)
		{

			switch ($tipo) {
        case "especialidade":
            $sql="update dentista set especialidade='".
			$dentista->getEspecialidade()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
            break;
        case "nome":
            $sql="update dentista set nome='".
			$dentista->getNome()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
            break;
        case "endereco":
            $sql="update dentista set endereco='".
			$dentista->getEndereco()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
            break;
        case "telefone":
            $sql="update dentista set telefone='".
			$dentista->getTelefone()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
            break;
        case "email":
            $sql="update dentista set email='".
			$dentista->getEmail()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
            break;
		}
		return $this->conexao->executar($sql);
		
    	
	}
}
/*
		public function alterar($dentista,$tipo)
		{
		if ($tipo=="dentista") {
			$sql="update dentista set especialidade='".
			$dentista->getEspecialidade()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
		}else{
			$sql="update dentista set nome='".
			$dentista->getNome()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();

			$sql="update dentista set endereco='".
			$dentista->getEndereco()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();

			$sql="update dentista set telefone='".
			$dentista->getTelefone()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();

			$sql="update dentista set email='".
			$dentista->getEmail()."' where id_funcionario_pk=".
			$dentista->getId_Funcionario_Pk();
		}
		return $this->conexao->executar($sql);
		}
	}
	*/
?>