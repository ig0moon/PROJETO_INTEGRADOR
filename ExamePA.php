<?php

require_once 'Banco.php';

class ExamePA{

	private $conexao;

	function __construct()
	{
		$this->conexao=new Banco();
	}

	public function cadastrar($exame)
	{
		$sql="insert into exame values(".
			$exame->getTipo().",'".
			$exame->getData()."','".
			$exame->getHora()."',".
			$exame->getImagem().",'".
			$exame->getResultado()."')";

		return $this->conexao->executar($sql);
	}

	public function retornarUltimo()
	{
		$sql="select max(id) from exame";
		$consulta=$this->conexao->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			$linha=$consulta->fetch_assoc();
			$exame=0;
			if($linha['max(id)']!=null){
				$situacao=$linha['max(id)'];
			}
			return $id;
		}
	}

	public function listar($inicio,$fim)
	{
		$sql="select * from exame where id 
		between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}

	public function excluir($exame)
	{
		$sql="select diagnostico from exame where id=$id";
		return $this->conexao->executar($sql);
	}
	public function listarResultado($inicio,$fim)
	{
		$sql="select resultado from exame where between $inicio and $fim";
		return $this->conexao->executar($sql);
	}
}

?>