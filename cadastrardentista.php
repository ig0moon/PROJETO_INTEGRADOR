<?php
	require_once 'cabecalho.php'
?>

	<form action="cadastrardentista.php" method="POST" enctype="multipart/form-data">
		<h2>Cadastrar Dentista</h2>
        
        <p>Nome:</p>
		<p><input type="text" name="nome" size="50" maxlength="50" required></p>
		<p>Especialidade:</p>
		<p><input type="text" name="especialidade" size="25" maxlength="25" required></p>  
		<p>Endereço:</p>
		<p><input type="text" name="endereco" size="100" maxlength="100" required></p>
		<p>Telefone:</p>
		<p><input type="text" name="telefone" size="14" maxlength="14" required></p>
		<p>E-mail:</p>
		<p><input type="text" name="email" size="50" maxlength="50" required></p>
		<p>CPF:</p>
		<p><input type="text" name="cpf" size="25" maxlength="25" required></p>
		<p>CRM:</p>
		<p><input type="number" name="crm" size="14" maxlength="14" required></p>

		<p><input type="submit" name="botao" value="Cadastrar"></p>
	</form>

<?php

	if (isset($_POST['botao'])){
		require_once 'model/Dentista.php';
		require_once 'persistence/DentistaPA.php';
		$dentista=new Dentista();
		$dentistapa=new DentistaPA();

		$dentista->setCpf($_POST['cpf']);
		$dentista->setEspecialidade($_POST['especialidade']);
		$dentista->setNome($_POST['nome']);
		$dentista->setEndereco($_POST['endereco']);
		$dentista->setTelefone($_POST['telefone']);
		$dentista->setEmail($_POST['email']);
		$dentista->setCrm($_POST['crm']);

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
<?php
	require_once 'rodape.php';
?>