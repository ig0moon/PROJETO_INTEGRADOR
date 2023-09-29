<?php  
require_once 'cabecalho.php';
?>

	<div id="painel">

<?php
echo "<form action='alterardentista.php' method='POST' class='normal'>";
echo "<h2>Alterar Dentista</h2>";
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
		$dentista->setId_Funcionario_Pk($linha['id_funcionario_pk']);
		$dentista->setEspecialidade($linha['especialidade']);
		$dentista->setNome($linha['nome']);
		$dentista->setEndereco($linha['endereco']);
		$dentista->setTelefone($linha['telefone']);
		$dentista->setEmail($linha['email']);
		echo "<option value='".$dentista->getId_Funcionario_Pk()."'>".$dentista->getNome()."</option>";
		
	}
	echo "</select>";
	echo "<p>Mudar:</p>";
	echo "<h5><input type='radio' name='tipo' value='especialidade' required>Especialidade</h5>";
	echo "<h5><input type='radio' name='tipo' value='nome' required>Nome</h5>";
	echo "<h5><input type='radio' name='tipo' value='endereco' required>Endereco</h5>";
	echo "<h5><input type='radio' name='tipo' value='telefone' required>Telefone</h5>";
	echo "<h5><input type='radio' name='tipo' value='email' required>Email</h5>";
	echo "<p>Para:</p>";
	echo "<p><input type='text' name='para' size='20'></p>";
	echo "<p><input class='btn' type='submit' name='botao' value='Alterar'></p>";
}
echo "</form>";

if (isset($_POST['botao'])) {
	$sdentista=new Dentista();
	$sdentistapa=new DentistaPA();
	if ($_POST['tipo']=="especialidade") {
		$sdentista->setEspecialidade($_POST['para']);
		$sdentista->setId_Funcionario_Pk($_POST['dentistas']);
		$resp=$sdentistapa->alterar($sdentista,$_POST['tipo']);
	}else if($_POST['tipo']=="nome"){
		$sdentista->setNome($_POST['para']);
		$sdentista->setId_Funcionario_Pk($_POST['dentistas']);
		$resp=$sdentistapa->alterar($sdentista,$_POST['tipo']);
	}else if($_POST['tipo']=="endereco"){
		$sdentista->setEndereco($_POST['para']);
		$sdentista->setId_Funcionario_Pk($_POST['dentistas']);
		$resp=$sdentistapa->alterar($sdentista,$_POST['tipo']);
	}else if($_POST['tipo']=="telefone"){
		$sdentista->setTelefone($_POST['para']);
		$sdentista->setId_Funcionario_Pk($_POST['dentistas']);
		$resp=$sdentistapa->alterar($sdentista,$_POST['tipo']);
	}else if($_POST['tipo']=="email"){
		$sdentista->setEmail($_POST['para']);
		$sdentista->setId_Funcionario_Pk($_POST['dentistas']);
		$resp=$sdentistapa->alterar($sdentista,$_POST['tipo']);
	}
	if (!$resp) {
		echo "<h2>Erro na tentativa de alterar Dentista!</h2>";
	}else{
		echo "<h2>Dentista alterado com succeso!</h2>";
	}
}
?>
</div>
</body>
</html>