<?php
	require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="listar_exames.php" method="POST" class="normal">

		<h2>Buscar</h2>
		<p><input type="search" name="busca" required></p>
		<p><input type="submit" name="botao" value="Buscar"></p>

	</form>
</div>

<?php
	if (isset($_POST['botao'])){

		require_once 'model/Exame.php';
		require_once 'persistence/ExamePA.php';

		$consulta=new Exame();
		$consultapa=new ExamePA();

		$consulta=$consultapa->buscar($_POST['busca']);

		if (!$consulta){
			echo "<h2>Nenhum exame encontrado.</h2>";
		} else{
			if (isset($_COOKIE['paciente'])){

				echo "<table>";
					echo "<tr>";
						echo "<th>Tipo</th>";
						echo "<th>Descrição</th>";
						echo "<th>Resultado</th>";
						echo "<th>Hora</th>";
						echo "<th>Data agenda</th>";
						echo "<th>Detalhes</th>";
					echo "</tr>";

			while ($linha=$consulta->fetch_assoc()){
					echo "<tr>";
						echo "<td>".$linha['tipo']."</td>";
						echo "<td>".$linha['descricao']."</td>";
						echo "<td>".$linha['resultado']."</td>";
						echo "<td>".$linha['hora']."</td>";
						echo "<td>".$linha['data_agenda']."</td>";
						echo "<td><button class='btn' onclick='window.location.href='/PROJETO_INTEGRADOR/detalhes';'>Ver detalhes</td>";
					echo "</tr>";
			}
			echo "</table>";
		}
	}
}
?>