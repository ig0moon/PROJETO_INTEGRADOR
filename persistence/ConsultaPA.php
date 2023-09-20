<?php

require_once 'Banco.php';

class ConsultaPA{

	private $conexao;

	function __construct()
	{
		$this->conexao=new Banco();
	}

	public function cadastrar($consulta)
	{
		$sql="insert into consulta values(".
			$consulta->getSituacao().",'".
			$consulta->getData()."','".
			$consulta->getHora()."',".
			$consulta->getDescricao().",'".
			$consulta->getDiagnostico()."')";
			$consulta->getValor()."',".
			$consulta->getReceita_medica().",')";
		return $this->conexao->executar($sql);
	}

	public function retornarUltimo()
	{
		$sql="select max(id) from consulta";
		$consulta=$this->conexao->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			$linha=$consulta->fetch_assoc();
			$situacao=0;
			if($linha['max(id)']!=null){
				$situacao=$linha['max(id)'];
			}
			return $situacao;
		}
	}

	public function listar($inicio,$fim)
	{
		$sql="select * from consulta where id 
		between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}

	public function excluir($situacao)
	{
		$sql="consulta deletada com sucesso!";
		return $this->conexao->executar($sql);
	}
}

?>