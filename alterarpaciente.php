<?php
	require_once 'cabecalho.php';
?>

	<div id="painel">

<?php

	if (isset($_POST['botao'])&&isset($_POST['id'])){
		require_once 'model/Paciente.php';
		require_once 'persistence/PacientePA.php';
		$paciente=new Paciente();
		$pacientepa=new PacientePA();

		$consulta=$pacientepa->buscarPorId($_POST['id']);
		if (!$consulta){
			echo "<h2>Nenhum paciente encontrado.</h2>";
		} else{
			while ($linha=$consulta->fetch_assoc()){
				$paciente->setId_paciente_pk($linha['id_paciente_pk']);
				$paciente->setNome($linha['nome']);
				$paciente->setTelefone($linha['telefone']);
				$paciente->setEmail($linha['email']);
				$paciente->setSenha($linha['senha']);
				$paciente->setEndereco($linha['endereco']);
			}
		}

?>
		<form action="alterarpaciente.php" method="POST" enctype="multipart/form-data" class="normal">

		<h2>Alterar Paciente</h2>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" placeholder="<?= $paciente->getNome() ?>" maxlength="25" pattern="[A-Za-z\éÉãÃçÇ]{3,50}"></p>

		<p>Telefone:</p>
		<p><input type="text" name="telefone" placeholder="<?= $paciente->getTelefone() ?>" maxlength="30" pattern="[0-9]{9,12}"></p>

		<p>Email:</p>
		<p><input type="text" name="email" placeholder="<?= $paciente->getEmail() ?>"  maxlength="30" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}${3,50}"></p>

		<p>Senha:</p>
		<p><input type="password" name="senha" placeholder="<?= $paciente->getSenha() ?>" maxlength="20"></p>

		<p>Endereço:</p>
		<p><input type="text" name="endereco" placeholder="<?= $paciente->getEndereco() ?>" maxlength="30" pattern="[A-Za-z0-9\éÉãÃçÇ]{3,50}"></p>

		<input type="hidden" name="idalt" value="<?= $paciente->getId_paciente_pk() ?>">
		
		<p><input type="submit" name="botao" value="Alterar"></p>

	</form>

<?php
		}

	if (isset($_POST['botao'])&&isset($_POST['idalt'])){
		require_once 'model/Paciente.php';
		require_once 'persistence/PacientePA.php';
		$paciente=new Paciente();
		$pacientepa=new PacientePA();

		$consulta=$pacientepa->buscarPorId($_POST['idalt']);
		if (!$consulta){
			echo "<h2>Nenhum paciente encontrado.</h2>";
		} else {
			$paciente->setId_paciente_pk($_POST['idalt']);
			$paciente->setNome($_POST['nome']);
			$paciente->setTelefone($_POST['telefone']);
			$paciente->setEmail($_POST['email']);
			$paciente->setSenha($_POST['senha']);
			$paciente->setEndereco($_POST['endereco']);
			
			$resp=$pacientepa->alterar($paciente);
			if (!$resp){
				echo "<h2>Erro ao tentar alterar.</h2>";
			} else{
				echo "<h2>Paciente alterado com sucesso.</h2>";
			}
		}
	}

?>
</div>
</body>
</html>