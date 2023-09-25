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

	require_once 'buscaden.php';

	echo "<table>";
	echo "<tr>";
	echo "<th>Especialidade</th>";
	echo "<th>Nome</th>";
	echo "<th>Endereço</th>";
	echo "<th>Telefone</th>";
	echo "<th>Email</th>";
	echo "<th>CRM</th>";
	echo "</tr>";

	while($linha=$consulta->fetch_assoc()){
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