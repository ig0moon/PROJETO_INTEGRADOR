<?php
	require_once 'cabecalho.php';
?>

    <h2>Pacientes</h2>

<?php
	if(isset($_POST['inicio'])){
		$inicio=$_POST['inicio'];
		$fim=$inicio+4;

	} else{
		$inicio=1;
		$fim=5;
	}

	require_once 'persistence/PacientePA.php';
	$pacientepa=new PacientePA();
	$consulta=$pacientepa->listar_inicio_fim($inicio,$fim);
	if (!$consulta){
		echo "<h2>Ainda não exitem pacientes.</h2>";

	} else{

		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nome</th>";
		echo "<th>Telefone</th>";
		echo "<th>CPF</th>";
		echo "<th>Email</th>";
		echo "</tr>";

		while ($linha=$consulta->fetch_assoc()){
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
		$max=$pacientepa->retornarUltimo();

		if ($fim<$max){
			$inicio=$fim+1;
			echo "<form action='listarpaciente.php' method='POST'>";
			echo "<input type='hidden' name='inicio' value='$inicio'>";
			echo "<input class='mais' type='submit' name='botao' value='Mais...''>";
		echo "</section>"; 
		}
	}
?>
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
<br/>
<?php
	require_once 'rodape.php';
?>
<?php
	require_once 'rodape.php';
?>
</body>
</html>