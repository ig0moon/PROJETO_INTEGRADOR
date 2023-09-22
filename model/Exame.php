<?php

class Exame{
		private $id_exame_pk;
		private $id_dentista_fk;
		private $id_paciente_fk;
		private $tipo;
		private $descricao;
		private $resultado;
		private $hora;
		private $data_agenda;
		private $imagem;

	public function setId_exame_pk($id_consulta_pk)
	{
		$this->id_consulta_pk=$id_consulta_pk;
	}
	public function getId_exame_pk()
	{
		return $this->id_consulta_pk;
	}

	public function setId_dentista_fk($id_dentista_fk)
	{
		$this->id_dentista_fk=$id_dentista_fk;
	}
	public function getId_dentista_fk()
	{
		return $this->id_dentista_fk;
	}

	public function setId_paciente_fk($id_paciente_fk)
	{
		$this->id_paciente_fk=$id_paciente_fk;
	}
	public function getId_paciente_fk()
	{
		return $this->id_paciente_fk;
	}

	public function setTipo($tipo)
	{
		$this->tipo=$tipo;
	}
	public function getTipo()
	{
		return $this->tipo;
	}
	public function setDescricao($descricao)
	{
		$this->descricao=$descricao;
	}
	public function getDescricao()
	{
		return $this->descricao;
	}
	public function setResultado($resultado)
	{
		$this->resultado=$resultado;
	}
	public function getResultado()
	{
		return $this->resultado;
	}
	public function setHora($hora)
	{
		$this->hora=$hora;
	}
	public function getHora()
	{
		return $this->hora;
	}
	public function setData_agenda($data_agenda)
	{
		$this->data_agenda=$data_agenda;
	}
	public function getData_agenda()
	{
		return $this->data_agenda;
	}
	public function setImagem($imagem)
	{
		$this->imagem=$imagem;
	}
	public function getImagem()
	{
		return $this->imagem;
	}
}

?>