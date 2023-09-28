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
			$exame->getId_exame_pk().",".
			$exame->getId_dentista_fk().",".
			$exame->getId_paciente_fk().",'".
			$exame->getTipo()."','".
			$exame->getDescricao()."','".
			$exame->getResultado()."','".
			$exame->getHora()."','".
			$exame->getData_agenda()."','".
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
			$situacao=0;
			if($linha['max(id_examen_pk)']!=null){
				$situacao=$linha['max(id_examen_pk)'];
			}
			return $situacao;
		}
	}

	public function listar_inicio_fim($inicio,$fim)
	{
		$sql="select * from exame where id_examen_pk 
		between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}
	public function listar(){
		$sql="select * from exame";
		return $this->conexao->consultar($sql);
	}

	public function excluir($exame)
	{
		/*Essa função não faz o menor sentido ainda, não sei quem criou. se alguém for usar, favor arrumar. ASSINADO:PDREAM-KA-EL O SPAMCA_BOMBA*/
		$sql="select diagnostico from exame where id_examen_pk=$id";
		return $this->conexao->executar($sql);
	}
		public function listarResultado($inicio,$fim)
	{
		$sql="select resultado,id_examen_pk from exame where id_examen_pk between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}

	public function buscar($busca){
			$sql="select * from exame where Id_examen_pk='$busca' or Id_dentista_fk='$busca' or Id_paciente_fk='$busca' or hora like '%$busca%' or data_agenda like '%$busca%' or tipo like '%$busca%' or descricao like '%$busca%'";
			return $this->conexao->consultar($sql);
		}

	public function buscarPorId($id)
		{
			$sql="select * from exame where id_examen_pk=$id";
			return $this->conexao->consultar($sql);

		}
		public function buscaPorResultado($id)	
		{
		$sql = "select resultado from exame where id_paciente_fk=$id";
		return $this->conexao->consultar($sql);
	}
}

?>
</body>
</html>