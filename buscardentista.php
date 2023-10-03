<?php
require_once 'cabecalho.php';
/*
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
}*/

echo"<h2>Dentistas</h2>";

echo "<div id='painel'>";
echo "<form action='buscardentista.php' method='GET'>";
echo "<input type='search' name='busca'>";
echo "<input class='btn' type='submit' name='botao' value='Buscar'>";
echo"</form>";
echo "</div>";

if (isset($_GET['botao'])&&isset($_GET['busca'])){
	require_once 'persistence/DentistaPA.php';
     $dentistapa=new DentistaPA();
     $fodase= $_GET['busca'];
     echo $_GET['busca'];
     $consulta=$dentistapa->buscar($_GET['busca']);
     if (!$consulta){
		echo "<h2>Não foi possível recuperar nenhum dentista.</h2>";

	}else{
		echo "<table>";
		echo "<tr>";
		echo "<th>Especialidade</th>";
		echo "<th>Nome</th>";
		echo "<th>Endereço</th>";
		echo "<th>Telefone</th>";
		echo "<th>Email</th>";
		echo "<th>CRM</th>";
		if (isset($_COOKIE['admin'])) {
			echo "<th>Alterar</th>";
		}
		$consultag=$dentistapa->listar();
		while($linha=$consultag->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['especialidade']."</td>";
			echo "<td>".$linha['nome']."</td>";
			echo "<td>".$linha['endereco']."</td>";
			echo "<td>".$linha['telefone']."</td>";
			echo "<td>".$linha['email']."</td>";
			echo "<td>".$linha['crm']."</td>";
			if (isset($_COOKIE['admin'])) {

				echo "<td><form action='alterardentista.php'>";
				echo "<div id='alterar'>";
				echo "<input class='btn' type='submit' name='alterar' value='Alterar'></div></td>";
				// echo "<td>
				// <div id='alterar'>
				// <a href='/PROJETO_INTEGRADOR/alterarden'>Alterar</a>
				// </div>
				// </td>";
			}		
			echo "</tr>";
		}
		echo "</table>";
		echo "</tr>";

	}
}
?>
</body>