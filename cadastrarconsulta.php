<?php

require_once 'cabecalho.php';

?>

<form action="cadastrarconsulta.php" method="POST" class="">
	<h2>Cadastrar Consulta</h2>
	<p>Diagnostico:<textarea name="diagnostico" rows="5" cols="100" required></textarea></p>
	<p>Data:<input type="date" name="data"></p>
	<p>Valor R$:<input type="text" name="valor" maxlength="7" size="7" pattern="[0-9,.]{1,5}[0-9]{2}" placeholder="99.99"></p>
	<p>Situação:<textarea name="situacao" rows="5" cols="100" required></textarea></p>
	<p>Hora:<input type="time" name="hora"></p>
	<p>Receita medica:<textarea name="receitamedica" rows="5" cols="100" required></textarea></p>
	<p>Descriçaõ:<textarea name="descricao" rows="5" cols="100" required></textarea></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>

<?php  

if (isset($_POST['botao'])) {
	require_once 'model/Cosulta.php';
	require_once 'persistence/CosultaPA.php';
	$consulta=new Consulta();
	$consultapa=new ConsultaPA();

	$consulta->setDiagnostico($_POST['diagnostico']);
	$consulta->setData($_POST['data']);
	$consulta->setValor($_POST['valor']);
	$consulta->setValor(str_replace(",",".",$consulta->getValor()));
	$consulta->setSituacao($_POST['situacao']);
	$consulta->setHora($_POST['hora']);
	$consulta->setReceita_medica($_POST['receitamedica']);
	$consulta->setDescricao($_POST['descricao']);
	$id=$consulta->retornarUltimo();
	if ($id>=0) {
		$id++;
	}else{
		$id=1;
	}
}

?>
</body>
</html>