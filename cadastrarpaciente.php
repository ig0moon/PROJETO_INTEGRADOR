 	<?php
	require_once 'cabecalho.php'
?>

	<div id="painel">
		<form action="cadastrarpaciente.php" method="POST" enctype="multipart/form-data" class="normal">

			<h2>Cadastrar Paciente</h2>

			<p>Nome:</p>
			<p><input type="text" name="nome" maxlength="25" pattern="[A-Za-z\éÉãÃçÇ]{3,50}" required></p>

			<p>CPF:</p>
			<p><input type="number" name="cpf" maxlength="11" pattern="[0-9]{9,12}" placeholder="11 números" required></p>
			
			<p>Email:</p>
			<p><input type="text" name="email" maxlength="30" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}${3,50}" required></p>

			<p>Senha:</p>
			<p><input type="password" name="senha" maxlength="20" required></p>

			<p>Telefone:</p>
			<p><input type="number" name="telefone" maxlength="30" pattern="[0-9]{9,12}" placeholder="yyxxxxxxxxx" required></p>
			
			<p>Endereço:</p>
			<p><input type="text" name="endereco" maxlength="30" pattern="[A-Za-z0-9\éÉãÃçÇ]{3,50}" required></p>

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
		$paciente->setSenha($_POST['senha']);
		$paciente->setEmail($_POST['email']);
		$paciente->setTelefone($_POST['telefone']);
		$paciente->setEndereco($_POST['endereco']);
		$paciente->setCpf($_POST['cpf']);
		$id=$pacientepa->retornarUltimo();
		if ($id>0){
			$id++;
		} else{
			$id=1;
		}
		$paciente->setId_paciente_pk($id);
		
		$resp=$pacientepa->cadastrar($paciente);
		if (!$resp){
			echo "<h2>Erro na tentativa de cadastrar! Tente novamente!</h2>";
		} else{
			echo "<h2>Paciente cadastrado com sucesso!</h2>";
		}
	}

	require_once 'rodape.php';
?>