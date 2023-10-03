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
		$sql="select * from consulta where id_consulta_pk 
		between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}
	public function listar(){
		$sql="select * from consulta";
		return $this->conexao->consultar($sql);
	}
	public function excluir($situacao)
	{
		/*nao funciona, por tanto nao use*/
		$sql="consulta deletada com sucesso!";
		return $this->conexao->executar($sql);
	}

	public function buscar($busca){
			$sql="select * from consulta where id_consulta_pk='$busca' or id_dentista_fk='$busca' or id_paciente_fk='$busca' or diagnostico like '%$busca%' or data like '%$busca%' or valor like '%$busca%' or situacao like '%$busca%' or hora like '%$busca%' or receita_medica like '%$busca%' or descricao like '%$busca%'";
			return $this->conexao->consultar($sql);
		}
	public function buscarPorIdPaciente($id){
		$sql="select * from consulta where id_paciente_fk=$id";
		return $this->conexao->consultar($sql);
	}
	public function converteIdParaNomeDentista($id)
		{
			$sql="select dentista.nome as nome from consulta join dentista on consulta.id_dentista_fk=dentista.id_funcionario_pk where id_funcionario_pk=$id";
			return $this->conexao->consultar($sql);
		}

	public function converteIdParaNomePaciente($id)
		{
			$sql="select paciente.nome as nome from consulta join paciente on consulta.id_paciente_fk=paciente.id_paciente_pk where id_paciente_pk=$id";
			return $this->conexao->consultar($sql);
		}
}

?>