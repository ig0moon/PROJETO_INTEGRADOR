<?php
require_once 'cabecalho.php';
/*
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
 	 		echo "<form action='detalhes.php' method='POST'>";
 	 		if($consultag){
 	 			$linhag=$consultag->fetch_assoc();
 	 			echo "<input type='hidden' value='".$linhag['id_examen_pk']."' name='id'>";
 			}
 	 		echo "<input type='submit' name='botao' value='Ver' class='btn'>";
 	 		echo "</form>";
 	 		echo "</div>";
 	 	}
 	 	echo "</section>";
 	}
}else{
 	echo "<h2>Digite nome do paciente &uarr;</h2>";
}*/

echo"<h2>Pacientes</h2>";

echo "<div id='painel'>";
echo "<form action='buscarpaciente.php' method='GET'>";
echo "<input type='search' name='busca'>";
echo "<input class='btn' type='submit' name='botao' value='Buscar'>";
echo"</form>";
echo "</div>";


if (isset($_GET['botao'])&&isset($_GET['busca'])) {

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
		//echo "<th>Email</th>";

		if (isset($_COOKIE['admin'])||isset($_COOKIE['paciente'])||isset($_COOKIE['dentista'])) {
			if(isset($_COOKIE['admin'])){
				echo "<th>Alterar</th>";
			}
			echo "<th>Detalhes</th>";
		}
		echo "</tr>";
		//$consultag=$pacientepa->listar_inicio_fim($inicio,$fim);
		while ($linha=$consulta->fetch_assoc()){
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
						<input type='submit' name='botao' value='Alterar ".$linha['nome']."'>"."
						</div>
						</form>
						</td>";
					
				}
				echo "<td>";
				echo "<form action='detalhes.php' method='POST'>";
				echo "<input type='hidden' name='idP' value='".$linha['id_paciente_pk']."'>";
				/*
				require_once 'persistence/examePA.php';
 	 			$examepa=new ExamePA();
 	  			$consultag=$examepa->buscarPorIdPaciente($linha['id_paciente_pk']);
 		 		
  	 			if($consultag){
	 				$linhag=$consultag->fetch_assoc();
 	 				echo "<input type='hidden' value='".$linhag['id_examen_pk']."' name='idE'>";
 				}
				require_once 'persistence/consultaPA.php';
 				$consultapa=new ConsultaPA();
 	  			$consultag=$consultapa->buscarPorIdPaciente($linha['id_paciente_pk']);
 	 			if($consultag){
  					$linhag=$consultag->fetch_assoc();
  					echo "<input type='hidden' value='".$linhag['id_consulta_pk']."' name='idC'>";
				}
				*/
 				echo"<div id='alterar'>";
 				echo "<input type='submit' name='botao' value='Ver' >";//class='btn'
 				echo"</div>";
 				echo"</form>";
				echo"</td>";
			}
		}
		echo "</tr>";
		echo "</table>";

		echo "<section>";

	}
}
?>