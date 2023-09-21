 	<?php
	require_once 'cabecalho.php'
?>

	<div id="painel">
		<form action="cadastrarpaciente.php" method="POST" enctype="multipart/form-data" class="normal">

			<h2>Cadastrar Paciente</h2>

			<p>Nome:</p>
			<p><input type="text" name="nome" maxlength="25" required></p>

			<p>CPF:</p>
			<p><input type="number" name="cpf" maxlength="11" required></p>

			<p>Email:</p>
			<p><input type="text" name="email" maxlength="30" required></p>

			<p>Telefone:</p>
			<p><input type="text" name="telefone" maxlength="14" required></p>
			
			<p>Endereço:</p>
			<p><input type="text" name="endereco" maxlength="14" required></p>

			<p><input class="btn" type="submit" name="botao" value="Cadastrar"></p>
		</form>
	</div>

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
		$paciente->setEndereco($_POST['endereco']);
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

	require_once 'rodape.php';
?>