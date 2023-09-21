<?php
require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="login_dentista.php" method="POST">
		<h2>Login Dentista</h2>

		<p>Nome:</p>
		<p><input type="text" name="nome" size="20" maxlength="20" pattern="[0-9a-zA-Z_]{1,20}" required></p>

		<p>CRM:</p>
		<p><input type="text" name="crm" size="10" maxlength="10" pattern="[0-9a-zA-Z_\s@]{1,10}" required></p>

		<p><input class="btn" type="submit" name="botao" value="Logar"></p>
	</form>

<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Dentista.php';
		require_once 'persistence/DentistaPA.php';
		$dentista=new Dentista();
		$dentistapa=new DentistaPA();

		$dentista->setNome($_POST['nome']);
		$dentista->setCrm($_POST['crm']);
		$resp=$dentistapa->logar(
			$dentista->getNome(),$dentista->getCrm());
		if($resp){
			echo "<h2>Bem vindo ".
			$dentista->getNome()."!</h2>";
			setcookie("dentista",$dentista->getNome());
			echo "<meta http-equiv='refresh' content='2;url=/PROJETO_INTEGRADOR/dentista'>";
		}else{
			echo "<h2>Login Incorreto!</h2>";
		}

	}


?>

</div>
</body>
</html>