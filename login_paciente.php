<?php
require_once 'cabecalho.php';
?>
<form action="login_paciente.php" class="" method="POST">
	<h2>Login Paciente</h2>
	<p>Digite seu nome:<input type="text" name="usuario" size="20" maxlength="20" pattern="[0-9a-zA-Z_]{1,20}" required></p>
	<p>Digite seu CPF:<input type="text" name="cpf" size="11" maxlength="11" pattern="[0-9_]{1,11}" required></p>
	<p><input type="submit" name="botao" value="Logar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'persistence/PacientePA.php';
		$pacientepa=new PacientePA();
		$resp=$clientepa->logar($_POST['nome'],$_POST['cpf']);
		if (!$resp) {
			echo "<h2>Login Incorreto!</h2>";
		}else{
			setcookie("cliente",$_POST['cpf']);
			echo "<h2>Login com sucesso!<h2>";
			echo "<section><a href='/PROJETO_INTEGRADOR/'>Entrar</a></section>";
		}
	}
?>
</body>
</html>