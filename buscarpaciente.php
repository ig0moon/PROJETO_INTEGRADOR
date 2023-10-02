<?php
require_once 'cabecalho.php';

<<<<<<< HEAD
if (isset($_GET['botao'])&&isset($_GET['busca'])){
     require_once 'persistence/PacientePA.php';
     $pacientepa=new PacientePA();
     $consulta=$pacientepa->buscar($_GET['busca']);
	 if (!$consulta){
	 	echo "<h2>Nenhum Paciente correspondente!</h2>";
	 }else{
	 	echo "<section>";
	 	while ($linha=$consulta->fetch_assoc()){
	 		echo "<div id='painel'>";
	 		echo "<h2>".$linha['nome']."</h2>";
	 		require_once 'persistence/examePA.php';
	 		$examepa=new ExamePA();
	 	 	$consultag=$examepa->buscarPorIdPaciente($linha['id_paciente_pk']);
	 	 	var_dump($consultag);
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
	echo "<h2>Digite nome do paciente &uarr;</h2>";
}
=======
// if (isset($_GET['botao'])&&isset($_GET['busca'])){
//      require_once 'persistence/PacientePA.php';
//      $pacientepa=new PacientePA();
//      $consulta=$pacientepa->buscar($_GET['busca']);
// 	 if (!$consulta){
// 	 	echo "<h2>Nenhum Paciente correspondente!</h2>";
// 	 }else{
// 	 	echo "<section>";
// 	 	while ($linha=$consulta->fetch_assoc()){
// 	 		echo "<div id='painel'>";
// 	 		echo "<h2>".$linha['nome']."</h2>";
// 	 		require_once 'persistence/examePA.php';
// 	 		$examepa=new ExamePA();
// 	 	 	$consultag=$examepa->buscarPorIdPaciente($linha['id_paciente_pk']);
// 	 		echo "<form action='detalhes.php' method='POST'>";
// 	 		if($consultag){
// 	 			$linhag=$consultag->fetch_assoc();
// 	 			echo "<input type='hidden' value='".$linhag['id_examen_pk']."' name='id'>";
// 			}
// 	 		echo "<input type='submit' name='botao' value='Ver' class='btn'>";
// 	 		echo "</form>";
// 	 		echo "</div>";
// 	 	}
// 	 	echo "</section>";
// 	 }
// }else{
// 	echo "<h2>Digite nome do paciente &uarr;</h2>";
// }
>>>>>>> b84c86d1159f2f9a168f095d03212f22d70fb271
?>
<!-- </body> -->









<?php

if (isset($_POST['botao'])&&isset($_POST['busca'])) {

	require_once 'persistence/PacientePA.php';
	$pacientepa=new PacientePA();
	$consulta=$pacientepa->buscar($_GET['busca']);

	if (!$consulta){
		echo "<h2>Não foi possível recuperar nenhum paciente.</h2>";

	} else{

		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nome</th>";
		echo "<th>Telefone</th>";
		echo "<th>CPF</th>";
		echo "<th>Email</th>";
		echo "</tr>";

		$consultag=$pacientepa->listar_inicio_fim($inicio,$fim);
		while ($linha=$consultag->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['id_paciente_pk']."</td>";
			echo "<td>".$linha['nome']."</td>";
			echo "<td>".$linha['telefone']."</td>";
			echo "<td>".$linha['cpf']."</td>";
			echo "<td>".$linha['email']."</td>";
			echo "</tr>";
		}
		echo "</table>";

		echo "<section>";

	}
}
?>