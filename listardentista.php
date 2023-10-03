<?php
require_once 'cabecalho.php';
?>

    <h2>Dentistas</h2>

<?php
require_once 'persistence/DentistaPA.php';
$dentistapa=new DentistaPA();
$consulta=$dentistapa->listar();
if(!$consulta){
	echo "<h2>Ainda estamos cadastrando!</h2>";
}else{

	echo "<div id='painel'>";
	echo "<form action='buscardentista.php' method='GET'>";
	echo "<input type='search' name='busca'>";
	$linha=$consulta->fetch_assoc();
	echo "<input type='hidden' name='idbsc' value='".$linha['id_funcionario_pk']."'>";
	echo "<input class='btn' type='submit' name='botao' value='Buscar'>";
	echo "</form>";
	echo "</div>";

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

	echo "</tr>";
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
			echo "</div>";
			// echo "<td>
			// <div id='alterar'>
			// <a href='/PROJETO_INTEGRADOR/alterarden'>Alterar</a>
			// </div>
			// </td>";
		}		
		echo "</tr>";
	}
	echo "</table>";
	
}
?>
<!-- <br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php
	require_once 'rodape.php';
?> -->
</body>
</html>