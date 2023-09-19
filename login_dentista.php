<?php
require_once 'cabecalho.php';
?>
<form action="login_dentista.php" method="POST">
	<H1>Login Dentista</H1>
	<p>Nome:<input type="text" name="nome" 
		size="20" maxlength="20" 
		pattern="[0-9a-zA-Z_]{1,20}" required></p>
	<p>Senha:<input type="password" name="senha" 
		size="10" maxlength="10" 
		pattern="[0-9a-zA-Z_\s@]{1,10}" required></p>
	<p><input type="submit" name="botao" value="Logar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Dentista.php';
		require_once 'persistence/DentistaPA.php';
		$dentista=new Dentista();
		$dentistapa=new DentistaPA();

		$dentista->setNome($_POST['nome']);
		$dentista->setSenha($_POST['senha']);
		$resp=$dentistapa->logar(
			$dentista->getNome(),$dentista->getSenha());
		if($resp){
			echo "<h2>Bem vindo ".
			$dentista->getNome()."!</h2>";
			setcookie("dentista",$dentista->getNome());
			echo "<section><a href='/PROJETO_INTEGRADOR/admin'>Entrar</a></section>";
		}else{
			echo "<h2>Login Incorreto!</h2>";
		}

	}


?>
</body>
</html>