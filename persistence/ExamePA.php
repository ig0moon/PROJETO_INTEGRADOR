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
			$exame->getId_examen_pk().",".
			$exame->getId_dentista_fk().",".
			$exame->getId_paciente_fk().",'".
			$exame->getTipo()."','".
			$exame->getDescricao()."','".
			$exame->getResultado()."','".
			$exame->getHora()."','".
			$exame->getData()."','".
			$exame->getImagem()."')";
		
		return $this->conexao->executar($sql);
	}

	public function retornarUltimo()
	{
		$sql="select max(id_examen_pk) from exame";
		$consulta=$this->conexao->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			$linha=$consulta->fetch_assoc();
			$id=0;
			if($linha['max(id_examen_pk)']!=null){
				$id=$linha['max(id_examen_pk)'];
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
}

?>