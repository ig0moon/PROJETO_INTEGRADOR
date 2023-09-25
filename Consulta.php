<?php

class Consulta{
		private $id_funcionario_fk;
		private $id_paciente_fk;
		private $id_consulta_pk;
		private $descricao;
		private $situacao;
		private $receita_medica;
		private $valor;
		private $data;
		private $hora;
		private $diagnostico;
	public function setId_consulta_pk($id_consulta_pk)
	{
		$this->id_consulta_pk=$id_consulta_pk;
	}

	public function getId_consulta_pk()
	{
		return $this->id_consulta_pk;
	}
	public function setid_Paciente_fk($id_paciente_fk)
	{
		$this->id_paciente_fk=$id_paciente_fk;
	}

	public function getid_Paciente_fk()
	{
		return $this->id_paciente_fk;
	}
	public function setId_funcionario_fk($id_funcionario_fk)
	{
		$this->id_funcionario_fk=$id_funcionario_fk;
	}

	public function getId_funcionario_fk()
	{
		return $this->id_funcionario_fk;
	}
	public function setDescricao($descricao)
	{
		$this->descricao=$descricao;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setSituacao($situacao)
	{
		$this->situacao=$situacao;
	}

	public function getSituacao()
	{
		return $this->situacao;
	}

	public function setReceita_medica($receita_medica)
	{
		$this->receita_medica=$receita_medica;
	}

	public function getReceita_medica()
	{
		return $this->receita_medica;
	}

	public function setValor($valor)
	{
		$this->valor=$valor;
	}

	public function getValor()
	{
		return $this->valor;
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

	public function setDiagnostico($diagnostico)
	{
		$this->diagnostico=$diagnostico;
	}

	public function getDiagnostico()
	{
		return $this->diagnostico;
	}
}

?>