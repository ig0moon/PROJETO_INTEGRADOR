<?php
require_once 'cabecalho.php';
//pattern="[0-9éÉa-zA-Z_]{1,20}"
//pattern="[0-9a-zA-Z_\s@]{0,9}"
?>

<div id="painel">
	<form action="login_dentista.php" method="POST">
		<h2>Login Dentista</h2>

		<p>Nome:</p>
		<p><input type="text" name="nome" size="15" maxlength="50" required></p>

		<p>CRM:</p>
		<p><input type="text" name="crm" size="14" maxlength="14"  required></p>

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
			setcookie("dentistacrm",$dentista->getCrm());
			echo "<meta http-equiv='refresh' content='2;url=/PROJETO_INTEGRADOR/'>";
		}else{
			echo "<h2>Login Incorreto!</h2>";
		}

	}


?>

</div>
</body>
</html>