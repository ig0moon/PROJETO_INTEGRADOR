<?php
	require_once 'cabecalho.php'
?>

	<form action="cadastrardentista.php" method="POST" enctype="multipart/form-data">
		<h1>Cadastrar Dentista</h1>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" required></p>
		<p>Especialidade:</p>
		<p><input type="text" name="especialidade" maxlength="25" required></p>
		<p>Endereço:</p>
		<p><input type="text" name="endereco" maxlength="50" required></p>
		<p>Email:</p>
		<p><input type="text" name="email" maxlength="30" required></p>
		<p>Telefone:</p>
		<p><input type="text" name="telefone" maxlength="14" required></p>
		<p>Crm:</p>
		<p><input type="text" name="crm" maxlength="14" required></p>
		<p>Cpf:</p>
		<p><input type="number" name="cpf" maxlength="14" required></p>

		<p><input type="submit" name="botao" value="Cadastrar"></p>
	</form>

<?php

	if (isset($_POST['botao'])){
		require_once 'model/Dentista.php';
		require_once 'persistence/DentistaPA.php';
		$dentista=new Dentista();
		$dentistapa=new DentistaPA();

		$dentista->setNome($_POST['nome']);
		$dentista->setEspecialidade($_POST['especialidade']);
		$dentista->setEndereco($_POST['endereco']);
		$dentista->setEmail($_POST['email']);
		$dentista->setTelefone($_POST['telefone']);
		$dentista->setCrm($_POST['crm']);
		$dentista->setCpf($_POST['cpf']);

		$id=$dentistapa->retornarUltimo();
		if ($id>0){
			$id++;
		} else{
			$id=1;
		}
		$dentista->setId_Funcionario_Pk($id);
		
		$resp=$dentistapa->cadastrar($dentista);
		if (!$resp){
			echo "<h2>Erro na tentativa de cadastrar! Tente novamente!</h2>";
		} else{
			echo "<h2>Dentista cadastrado com sucesso!</h2>";
		}
	}

?>