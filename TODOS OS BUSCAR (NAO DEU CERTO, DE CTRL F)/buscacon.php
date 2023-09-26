<?php
	require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="listarconsulta.php" method="POST" class="normal">

		<h2>Buscar</h2>
		<p><input type="search" name="busca" required></p>
		<p><input type="submit" name="botao" value="Buscar"></p>

	</form>
</div>

<?php
	if (isset($_POST['botao'])){

		require_once 'model/Consulta.php';
		require_once 'persistence/ConsultaPA.php';

		$consulta=new Consulta();
		$consultapa=new ConsultaPA();

		$consulta=$consultapa->buscar($_POST['busca']);

		if (!$consulta){
			echo "<h2>Nenhuma consulta encontrada.</h2>";
		} else {

		if (isset($_COOKIE['admin'])){

			echo "<table>";
				echo "<tr>";
					echo "<table>";
    				echo "<tr>";
    				echo "<th>Id</th>";
   					echo "<th>Dentista</th>";
  					echo "<th>Paciente</th>";
    				echo "<th>Diagnostico</th>";
    				echo "<th>Data</th>";
   					echo "<th>Valor</th>";
   					echo "<th>Situacao</th>";
   					echo "<th>Hora</th>";
   					echo "<th>Receita medica</th>";
   					echo "<th>Descricao</th>";
				echo "</tr>";

			while ($linha=$consulta->fetch_assoc()){
					echo "<tr>";
        				echo "<td>".$linha['id_consulta_pk']."</td>";
        				echo "<td>".$linha['id_dentista_fk']."</td>";
        				echo "<td>".$linha['id_paciente_fk']."</td>";
        				echo "<td>".$linha['diagnostico']."</td>";
       					echo "<td>".$linha['data']."</td>";
        				echo "<td>".$linha['valor']."</td>";
        				echo "<td>".$linha['situacao']."</td>";
        				echo "<td>".$linha['hora']."</td>";
        				echo "<td>".$linha['receita_medica']."</td>";
        				echo "<td>".$linha['descricao']."</td>";
					echo "</tr>";
			}
			echo "</table>";
		}

		if (isset($_COOKIE['paciente'])){

			echo "<table>";
				echo "<tr>";
					echo "<table>";
    				echo "<tr>";
    				echo "<th>Id</th>";
   					echo "<th>Dentista</th>";
    				echo "<th>Diagnostico</th>";
    				echo "<th>Data</th>";
   					echo "<th>Valor</th>";
   					echo "<th>Situacao</th>";
   					echo "<th>Hora</th>";
   					echo "<th>Receita medica</th>";
   					echo "<th>Descricao</th>";
				echo "</tr>";

			while ($linha=$consulta->fetch_assoc()){
					echo "<tr>";
        				echo "<td>".$linha['id_consulta_pk']."</td>";
        				echo "<td>".$linha['id_dentista_fk']."</td>";
        				echo "<td>".$linha['diagnostico']."</td>";
       					echo "<td>".$linha['data']."</td>";
        				echo "<td>".$linha['valor']."</td>";
        				echo "<td>".$linha['situacao']."</td>";
        				echo "<td>".$linha['hora']."</td>";
        				echo "<td>".$linha['receita_medica']."</td>";
        				echo "<td>".$linha['descricao']."</td>";
					echo "</tr>";
			}
			echo "</table>";
		}
	}
}
?>