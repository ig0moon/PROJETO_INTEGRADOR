 	<?php
	require_once 'cabecalho.php'
?>

	<form action="cadastrarpaciente.php" method="POST" enctype="multipart/form-data" class="normal">
		<h1>Cadastrar Paciente</h1>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" required></p>
		<p>CPF:</p>
		<p><input type="number" name="cpf" maxlength="11" required></p>
		<p>Email:</p>
		<p><input type="text" name="email" maxlength="30" required></p>
		<p>Telefone:</p>
		<p><input type="text" name="telefone" maxlength="14" required></p>

		<p><input class="logar" type="submit" name="botao" value="Cadastrar"></p>
	</form>

<?php

	if (isset($_POST['botao'])){
		require_once 'model/Paciente.php';
		require_once 'persistence/PacientePA.php';
		$paciente=new Paciente();
		$pacientepa=new PacientePA();

		$paciente->setNome($_POST['nome']);
		$paciente->setCpf($_POST['cpf']);
		$paciente->setEmail($_POST['email']);
		$paciente->setTelefone($_POST['telefone']);
		$id=$pacientepa->retornarUltimo();
		if ($id>0){
			$id++;
		} else{
			$id=1;
		}
		$paciente->setId($id);
		
		$resp=$pacientepa->cadastrar($paciente);
		if (!$resp){
			echo "<h2>Erro na tentativa de cadastrar! Tente novamente!</h2>";
		} else{
			echo "<h2>Paciente cadastrado com sucesso!</h2>";
		}
	}

?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
	require_once 'rodape.php';
?>