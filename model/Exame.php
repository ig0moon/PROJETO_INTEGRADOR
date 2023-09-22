<?php

class Exame{
		private $tipo;
		private $imagem;
		private $resultado;
		private $data;
		private $hora;
		private $descricao;
		private $id_paciente_fk;
		private $id_examen_pk;
		private $id_dentista_fk;
		
		

 	public function setTipo($tipo)
	{
		$this->tipo=$tipo;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setImagem($imagem)
	{
		$this->imagem=$imagem;
	}

	public function getImagem()
	{
		return $this->imagem;
	}

	public function setResultado($resultado)
	{
		$this->resultado=$resultado;
	}

	public function getResultado()
	{
		return $this->resultado;
	}

	public function setData($data)
	{
		$this->data=$data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setHora($hora)
	{
		$this->hora=$hora;
	}

	public function getHora()
	{
		return $this->hora;
	}
	
	public function setDescricao($descricao)
	{
		$this->descricao=$descricao;
	}

	public function getdescricao()
	{
		return $this->descricao;
	}
	public function setId_examen_pk($id_examen_pk)
	{
		$this->id_examen_pk=$id_examen_pk;
	}

	public function getId_examen_pk()
	{
		return $this->id_examen_pk;
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
	
}

?>