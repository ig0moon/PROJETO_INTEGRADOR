<?php
	require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="listardentista.php" method="POST" class="normal">

		<h2>Buscar</h2>
		<p><input type="search" name="busca" required></p>
		<p><input type="submit" name="botao" value="Buscar"></p>

	</form>
</div>

<?php
	if (isset($_POST['botao'])){

		require_once 'model/Dentista.php';
		require_once 'persistence/DentistaPA.php';

		$consulta=new Dentista();
		$consultapa=new DentistaPA();

		$consulta=$consultapa->buscar($_POST['busca']);

		if (!$consulta){
			echo "<h2>Nenhum dentista encontrado.</h2>";
		} else{
			if (isset($_COOKIE['admin'])){
				echo "<table>";
					echo "<tr>";
						echo "<th>Especialidade</th>";
						echo "<th>Nome</th>";
						echo "<th>Endereço</th>";
						echo "<th>Telefone</th>";
						echo "<th>Email</th>";
						echo "<th>CRM</th>";
						echo "<th>CPF</th>";
					echo "</tr>";

			while ($linha=$consulta->fetch_assoc()){
					echo "<tr>";
						echo "<td>".$linha['especialidade']."</td>";
						echo "<td>".$linha['nome']."</td>";
						echo "<td>".$linha['endereco']."</td>";
						echo "<td>".$linha['telefone']."</td>";
						echo "<td>".$linha['email']."</td>";
						echo "<td>".$linha['crm']."</td>";
						echo "<td>".$linha['cpf']."</td>";
					echo "</tr>";
			}
			echo "</table>";
		}
	}
}
?>