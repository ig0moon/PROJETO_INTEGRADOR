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
			$consulta->getId_consulta_pk().",".
			$consulta->getId_funcionario_fk().",".
			$consulta->getid_Paciente_fk().",'".
			$consulta->getDiagnostico()."','".
			$consulta->getData()."',".
			$consulta->getValor().",'".
			$consulta->getSituacao()."','".
			$consulta->getHora()."','".
			$consulta->getReceita_medica()."','".
			$consulta->getDescricao()."')";
		return $this->conexao->executar($sql);
	}

	public function retornarUltimo()
	{
		$sql="select max(id_consulta_pk) from consulta";
		$consulta=$this->conexao->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			$linha=$consulta->fetch_assoc();
			$situacao=0;
			if($linha['max(id_consulta_pk)']!=null){
				$situacao=$linha['max(id_consulta_pk)'];
			}
			return $situacao;
		}
	}

	public function listar_inicio_fim($inicio,$fim)
	{
		$sql="select * from consulta where id 
		between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}
	public function listar(){
		$sql="select * from consulta";
		return $this->conexao->consultar($sql);
	}
	public function excluir($situacao)
	{
		$sql="consulta deletada com sucesso!";
		return $this->conexao->executar($sql);
	}
}

?>