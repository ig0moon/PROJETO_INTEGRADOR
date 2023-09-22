<?php
require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="" class="normal" method="POST">
		<h2>Login Administrador</h2>

		<p>Usuário:</p>
			<p><input type="text" name="admin" size="20" maxlength="20" pattern="[0-9a-zA-Z_]{1,20}" required></p>

		<p>Senha:</p>
			<p><input type="password" name="senha" size="10" maxlength="10" pattern="[0-9a-zA-Z_\s@]{1,10}" required></p>

		<p><input class="btn" type="submit" name="botao" value="Logar"></p>
	</form>

<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Admin.php';
		require_once 'persistence/AdminPA.php';
		$admin=new Admin();
		$adminpa=new AdminPA();

		$admin->setNome($_POST['admin']);
		$admin->setSenha($_POST['senha']);
		$resp=$adminpa->logar(
			$admin->getNome(),$admin->getSenha());
		if($resp){
			echo "<h2>Bem vindo ".
			$admin->getNome()."!</h2>";
			setcookie("admin",$admin->getNome());
			echo "<meta http-equiv='refresh' content='2;url=/PROJETO_INTEGRADOR/'>";
		}else{
			echo "<h2>Login Incorreto!</h2>";
		}

	}
?>

</div>
</body>
</html>