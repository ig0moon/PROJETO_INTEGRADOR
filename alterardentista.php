<?php  
require_once 'cabecalho.php';

echo "<form action='alterardentista.php' method='POST' class='normal'>";
echo "<h1>Alterar ".$_COOKIE['dentista']."</h1>";
require_once 'persistence/DentistaPA.php';
require_once 'model/Dentista.php';
$dentista=new Dentista();
$dentistapa=new DentistaPA();
$consulta=$dentistapa->listar();
if (!$consulta) {
	echo "<h2>Erro ao tentar recuperar dados de Usuario!</h2>";
}else{
	
	echo "<select name='dentistas'>";
	while ($linha=$consulta->fetch_assoc()) {
		$dentista->setEspecialidade($linha['especialidade']);
		$dentista->setNome($linha['nome']);
		$dentista->setEndereco($linha['endereco']);
		$dentista->setTelefone($linha['telefone']);
		$dentista->setEmail($linha['email']);
		echo "<option value='".$dentistas->getId_Funcionario_Pk()."'>".$dentistas->getNome()."</option>";
		
	}
	echo "</select>";
	echo "<p>Mudar:</p>";
	echo "<p><input type='radio' name='tipo' value='especialidade'>Especialidade</p>";
	echo "<p><input type='radio' name='tipo' value='nome'>Nome</p>";
	echo "<p><input type='radio' name='tipo' value='endereco'>Endereco</p>";
	echo "<p><input type='radio' name='tipo' value='telefone'>Telefone</p>";
	echo "<p><input type='radio' name='tipo' value='email'>Email</p>";
	echo "<p>Para: <input type='text' name='para' size='20'></p>";
	echo "<p><input type='submit' name='botao' value='Alterar'></p>";
}
echo "</form>";

if (isset($_POST['botao'])) {
	if ($_POST['tipo']=="especialidade") {
		$dentista->setEspecialidade($_POST['para']);
		$dentista->setEspecialidade($_POST['dentistas']);
		$resp=$dentistapa->alterar($dentista,$_POST['tipo']);
	}else if($_POST['tipo']=="nome"){
		$dentista->setNome($_POST['para']);
		$dentista->setNome($_POST['dentistas']);
		$resp=$dentistapa->alterar($dentista,$_POST['tipo']);
	}else if($_POST['tipo']=="endereco"){
		$dentista->setEndereco($_POST['para']);
		$dentista->setEndereco($_POST['dentistas']);
		$resp=$dentistapa->alterar($dentista,$_POST['tipo']);
	}else if($_POST['tipo']=="telefone"){
		$dentista->setTelfone($_POST['para']);
		$dentista->setTelfone($_POST['dentistas']);
		$resp=$dentistapa->alterar($dentista,$_POST['tipo']);
	}else if($_POST['tipo']=="email"){
		$dentista->setEmail($_POST['para']);
		$dentista->setEmail($_POST['dentistas']);
		$resp=$dentistapa->alterar($dentista,$_POST['tipo']);
	}
	if (!$resp) {
		echo "<h2>Erro na tentativa de alterar Dentista!</h2>";
	}else{
		echo "<h2>Dentista alterado com succeso!</h2>";
	}
}
?>
</body>
</html>