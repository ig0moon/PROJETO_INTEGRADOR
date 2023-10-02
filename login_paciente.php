<?php
require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="login_paciente.php" class="" method="POST">
		<h2>Login Paciente</h2>

		<p>Digite seu nome:</p>
		<p><input type="text" name="usuario" size="20" maxlength="20" required></p>

		<p>Digite sua Senha:</p>
		<p><input type="password" name="senha" required></p>

		<p><input class="btn" type="submit" name="botao" value="Logar"></p>
	</form>

<?php
	if (isset($_POST['botao'])) {
		require_once 'persistence/PacientePA.php';
		$pacientepa=new PacientePA();
		$resp=$pacientepa->logar($_POST['usuario'],$_POST['senha']);
		if (!$resp) {
			echo "<h2>Login Incorreto!</h2>";
		}else{
			setcookie("paciente",$_POST['usuario']);
			echo "<p>Login com sucesso!</p>";
			echo "<meta http-equiv='refresh' content='2;url=/PROJETO_INTEGRADOR/'>";
		}
	}
?>

</div>
</body>
</html>