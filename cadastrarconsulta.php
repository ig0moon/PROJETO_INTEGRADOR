<?php

require_once 'cabecalho.php';

?>

	<div id="painel">

<form action="cadastrarconsulta.php" method="POST" class="">
	<h2>Cadastrar Consulta</h2>

	
	<?php
		require_once "model/Paciente.php";
		require_once "persistence/PacientePA.php";
		echo"<p>Pacientes</p>";
		echo "<select name='pacientes' required>";
		$paciente=new Paciente();
		$pacientepa=new PacientePA();
		$consultaP=$pacientepa->listar();
		while($linha=$consultaP->fetch_assoc()){
			$paciente->setId_paciente_pk($linha['id_paciente_pk']);
			$paciente->setNome($linha['nome']);
			echo "<option value='".$paciente->getId_paciente_pk()."'>".$paciente->getNome()."</option>";
			}
		echo "</select>";
		require_once "model/Dentista.php";
		require_once "persistence/DentistaPA.php";
		echo"<p>Dentista</p>";
		echo "<select name='dentistas' required>";
		$Dentista=new Dentista();
		$Dentistapa=new DentistaPA();
		$consultaD=$Dentistapa->listar();
		while($linha=$consultaD->fetch_assoc()){
			$Dentista->setId_Funcionario_Pk($linha['id_funcionario_pk']);
			$Dentista->setNome($linha['nome']);
			echo "<option value='".$Dentista->getId_Funcionario_Pk()."'>".$Dentista->getNome()."</option>";
			}
		echo "</select>";
	?>

	<p>Diagnostico:</p>
	<p><textarea name="diagnostico" rows="5" cols="100" required></textarea></p>

	<p>Data:</p>
	<p><input type="date" name="data"></p>

	<p>Valor R$:</p>
	<p><input type="text" name="valor" maxlength="7" size="7" pattern="[0-9,.]{1,5}[0-9]{2}" placeholder="99.99"></p>

	<p>Situação:</p>
	<p><textarea name="situacao" rows="5" cols="100" required></textarea></p>

	<p>Hora:</p>
	<p><input type="time" name="hora"></p>

	<p>Receita medica:</p>
	<p><textarea name="receitamedica" rows="5" cols="100" required></textarea></p>

	<p>Descrição:</p>
	<p><textarea name="descricao" rows="5" cols="100" required></textarea></p>

	<p><input class="btn" type="submit" name="botao" value="Cadastrar"></p>

</form>

<?php  

if (isset($_POST['botao'])) {
	require_once 'model/Consulta.php';
	require_once 'persistence/ConsultaPA.php';
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
	$id=$consultapa->retornarUltimo();

		if ($id>=0) {
			$id++;
		}else{
			$id=1;
		}
	
		$consulta->setId_funcionario_fk($_POST['dentistas']);
		$consulta->setId_Paciente_fk($_POST['pacientes']);
		$consulta->setId_consulta_pk($id);
		$resp=$consultapa->cadastrar($consulta);
		if(!$resp){
			echo"<p>Erro ao tentar cadastrar consulta</p>";
		}else{
			echo"<p>Consulta cadastrada com sucesso</p>";
		}
	}


?>

</div>
<br/>
<?php

require_once 'rodape.php';

?>