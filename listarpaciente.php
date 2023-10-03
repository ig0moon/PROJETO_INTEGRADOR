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

		echo "<div id='painel'>";
		echo "<form action='buscarpaciente.php' method='GET'>";
		echo "<input type='search' name='busca'>";
		//$linha=$consulta->fetch_assoc();
		//echo "<input type='hidden' name='idbsc' value='".$linha['id_paciente_pk']."'>";
		echo "<input class='btn' type='submit' name='botao' value='Buscar'>";
		echo"</form>";
		echo "</div>";

		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nome</th>";
		echo "<th>Telefone</th>";
		echo "<th>CPF</th>";
		//echo "<th>Email</th>";

		if (isset($_COOKIE['admin'])||isset($_COOKIE['paciente'])||isset($_COOKIE['dentista'])) {
			if(isset($_COOKIE['admin'])){
				echo "<th>Alterar</th>";
			}
			echo "<th>Detalhes</th>";
		}

		echo "</tr>";
		$consultag=$pacientepa->listar_inicio_fim($inicio,$fim);
		while ($linha=$consultag->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['id_paciente_pk']."</td>";
			echo "<td>".$linha['nome']."</td>";
			echo "<td>".$linha['telefone']."</td>";
			echo "<td>".$linha['cpf']."</td>";
			//echo "<td>".$linha['email']."</td>";

			if (isset($_COOKIE['admin'])||isset($_COOKIE['paciente'])||isset($_COOKIE['dentista'])) {
				if(isset($_COOKIE['admin'])){
				echo "<td>
					<form action='alterarpaciente.php' method='POST'>"."
					<input type='hidden' name='id' value='".$linha['id_paciente_pk']."'>"."
					<div id='alterar'>"."
					<input class='btn' type='submit' name='botao' value='Alterar ".$linha['nome']."'>"."
					</div>
					</form>
					</td>";
				}
				echo "<td>";
				echo "<form action='detalhes.php' method='POST'>";
				echo "<input type='hidden' name='idP' value='".$linha['id_paciente_pk']."'>";
				echo"<div id='alterar'>";
 				echo "<input class='btn' type='submit' name='botao' value='Ver' >";//class='btn'
 				echo"</div>";
 				echo"</form>";
				echo"</td>";
			}
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