<?php
require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="login_paciente.php" class="" method="POST">
		<h2>Login Paciente</h2>

		<p>Digite seu nome:</p>
		<p><input type="text" name="usuario" size="20" maxlength="20" pattern="[0-9a-zA-Z_]{1,20}" required></p>

		<p>Digite seu CPF:</p>
		<p><input type="text" name="cpf" size="11" maxlength="11" pattern="[0-9_]{1,11}" required></p>

		<p><input class="btn" type="submit" name="botao" value="Logar"></p>
	</form>
</div>
<?php
	if (isset($_POST['botao'])) {
		require_once 'persistence/PacientePA.php';
		$pacientepa=new PacientePA();
		$resp=$pacientepa->logar($_POST['usuario'],$_POST['cpf']);
		if (!$resp) {
			echo "<h2>Login Incorreto!</h2>";
		}else{
			setcookie("paciente",$_POST['cpf']);
			echo "<h2>Login com sucesso!<h2>";
			echo "<meta http-equiv='refresh' content='2;url=/PROJETO_INTEGRADOR/paciente'>";
		}
	}
?>
</body>
</html>