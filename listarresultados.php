<?php
	require_once 'cabecalho.php';
?>

    <h2>Resultados</h2>

<?php
if (isset($_COOKIE['paciente'])){
	require_once 'persistence/PacientePA.php';
	$pacientepa=new PacientePA();
	$senha=$_COOKIE['paciente'];
	$consulta=$pacientepa->converteSenhaParaId($senha);
	$linha=$consulta->fetch_assoc();
	$id=$linha['id_paciente_pk'];

	$resultados=$pacientepa->buscaPorResultado($id);
	if (!$resultados){
		echo "<h2>Ainda não tem resultados.</h2>";

	}else{
		echo "<table>";
		echo "<tr>";
		echo "<th>Id Consulta</th>";
		echo "<th>Resultado</th>";
		echo "</tr>";

		while ($linha=$resultados->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['id_examen_pk']."</td>";
			echo "<td>".$linha['resultado']."</td>";
			echo "</tr>";
		}
		echo "</table>";

	echo "<section>";
 	}
}
?>
</body>

