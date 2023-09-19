<?php

class Exame{
		private $tipo;
		private $imagem;
		private $resultado;
		private $data;
		private $hora;

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

	public function setHoras($hora)
	{
		$this->hora=$hora;
	}

	public function getHora()
	{
		return $this->hora;
	}
}

?>