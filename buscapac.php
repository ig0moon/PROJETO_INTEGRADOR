<?php
	require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="listarpaciente.php" method="POST" class="normal">

		<h2>Buscar</h2>
		<p><input type="search" name="busca" required></p>
		<p><input type="submit" name="botao" value="Buscar"></p>

	</form>
</div>

<?php
	if (isset($_POST['botao'])){

		require_once 'model/Paciente.php';
		require_once 'persistence/PacientePA.php';

		$consulta=new Paciente();
		$consultapa=new PacientePA();

		$consulta=$consultapa->buscar($_POST['busca']);

		if (!$consulta){
			echo "<h2>Nenhum paciente encontrado.</h2>";
		} else{
			if (isset($_COOKIE['admin'])){

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
		}

	}
}
?>