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

	public function listar($inicio,$fim)
	{
		$sql="select * from exame where id_examen_pk 
		between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}

	public function excluir($exame)
	{
		/*nao usar pois nao funciona*/
		$sql="select diagnostico from exame where id_examen_pk=$id";
		return $this->conexao->executar($sql);
	}
		public function listarResultado($inicio,$fim)
	{
		$sql="select resultado,id_examen_pk from exame where id_examen_pk between $inicio and $fim";
		return $this->conexao->consultar($sql);
	}
}

?>
</body>
</html>