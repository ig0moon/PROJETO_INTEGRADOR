<?php
require_once 'cabecalho.php';
?>
<form action="" class="normal" method="POST">
	<H1>Login Administrador</H1>
	<p>Usuário:<input type="text" name="admin" 
		size="20" maxlength="20" 
		pattern="[0-9a-zA-Z_]{1,20}" required></p>
	<p>Senha:<input type="password" name="senha" 
		size="10" maxlength="10" 
		pattern="[0-9a-zA-Z_\s@]{1,10}" required></p>
	<p><input type="submit" name="botao" value="Logar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Admin.php';
		require_once 'persistence/AdminPA.php';
		$admin=new admin();
		$adminpa=new adminPA();

		$admin->setadmin($_POST['admin']);
		$admin->setSenha($_POST['senha']);
		$resp=$adminpa->logar(
			$admin->getadmin(),$admin->getSenha());
		if($resp){
			echo "<h2>Bem vindo ".
			$admin->getadmin()."!</h2>";
			setcookie("admin",$admin->getadmin());
			echo "<section><a href=''>Entrar</a></section>";
		}else{
			echo "<h2>Login Incorreto!</h2>";
		}

	}


?>
</body>
</html>