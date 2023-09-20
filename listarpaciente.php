<?php
	require_once 'cabecalho.php';

	if(isset($_POST['inicio'])){
		$inicio=$_POST['inicio'];
		$fim=$inicio+4;

	} else{
		$inicio=1;
		$fim=5;
	}

	require_once 'persistence/PacientePA.php';
	$pacientepa=new PacientePA();
	$consulta=$pacientepa->listar($inicio,$fim);
	if (!$consulta){
		echo "<h2>Ainda estamos preparando os pratos!</h2>";

	} else{
		echo "<table>";
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Nome</th>";
		echo "<th>Descrição</th>";
		echo "<th>Valor R$</th>";
		echo "<th>Imagem</th>";
		echo "</tr>";

		while ($linha=$consulta->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['id']."</td>";
			echo "<td>".$linha['nome']."</td>";
			echo "<td>".$linha['descricao']."</td>";
			echo "<td>".$linha['valor']."</td>";
			echo "<td><img src='data:image/jpg;base64,".
			base64_encode($linha['imagem'])."'></td>";
			echo "</tr>";
		}
		echo "</table>";

		echo "<section>";
		$max=$produtopa->retornarUltimo();

		if ($fim<$max){
			$inicio=$fim+1;
			echo "<form action='listarproduto.php' method='POST'>";
			echo "<input type='hidden' name='inicio' value='$inicio'>";
			echo "<input class='mais' type='submit' name='botao' value='Mais...''>";
		echo "</section>"; 
		}
	}
?>
</body>
</html>