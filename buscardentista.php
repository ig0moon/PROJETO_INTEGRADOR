<?php
require_once 'cabecalho.php';

if (isset($_GET['botao'])&&isset($_GET['busca'])){
     require_once 'persistence/DentistaPA.php';
     $dentistapa=new DentistaPA();
     $consulta=$dentistapa->buscar($_GET['busca']);
	 if (!$consulta){
	 	echo "<h2>Nenhum Dentista correspondente!</h2>";
	 }else{
	 	echo "<section>";
	 	while ($linha=$consulta->fetch_assoc()){
	 	echo "<div id='painel'>";
	 	echo "<h2>".$linha['nome']."</h2>";
	 	require_once 'persistence/ExamePA.php';
	 	$examepa=new ExamePA();
	 	$consultag=$examepa->buscarPorIdDentista($linha['id_funcionario_pk']);
	 	$linhag=$consultag->fetch_assoc();
	 	echo "<form action='detalhes.php' method='POST'>";
	 	echo "<input type='hidden' value='".$linhag['id_examen_pk']."' name='id'>";
	 	echo "<input type='submit' name='botao' value='Ver' class='btn'>";
	 	echo "</form>";
	 	echo "</div>";
	 	}
	 	
	 	echo "</section>";
	 }
}else{
	echo "<h2>Digite nome do dentista &uarr;</h2>";
}
?>

<?php

if (isset($_POST['botao'])&&isset($_POST['busca'])) {

	require_once 'persistence/DentistaPA.php';
	$dentistapa=new DentistaPA();
	$consulta=$dentistapa->buscar($_GET['busca']);

	if (!$consulta){
		echo "<h2>Não foi possível recuperar nenhum dentista.</h2>";

	} else{

		echo "<table>";
		echo "<tr>";
		echo "<th>Especialidade</th>";
		echo "<th>Nome</th>";
		echo "<th>Endereço</th>";
		echo "<th>Telefone</th>";
		echo "<th>Email</th>";
		echo "<th>CRM</th>";
		echo "</tr>";

		$consultag=$pacientepa->listar_inicio_fim($inicio,$fim);
		while ($linha=$consultag->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['especialidade']."</td>";
			echo "<td>".$linha['nome']."</td>";
			echo "<td>".$linha['endereco']."</td>";
			echo "<td>".$linha['telefone']."</td>";
			echo "<td>".$linha['email']."</td>";
			echo "<td>".$linha['crm']."</td>";
			echo "</tr>";
		}
		echo "</table>";

		echo "<section>";

	}
}
?>
</body>