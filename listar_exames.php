<?php
require_once 'cabecalho.php';

if (isset($_POST['inicio'])) {
	$inicio=$_POST['inicio'];
	$fim=$inicio+4;
}else{
	$inicio=1;
	$fim=5;
}

require_once 'persistence/ExamePA.php';
$examepa=new ExamePA();
$consultar=$examepa->listar($inicio,$fim);
if(!$consulta){
	echo "<h2>Logo fica bão!</h2>";
}else{

	echo "<table>";
	echo "<tr>";
	echo "<th>Tipo</th>";
	echo "<th>Imagem</th>";
	echo "<th>Resultado</th>";
	echo "<th>Data</th>";
	echo "<th>Hora</th>";
	echo "</tr>";

	while ($linha=$consultar->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$linha['tipo']."</td>";
		echo "<td><img src='data:image/jpg;base64,".base64_encode($linha['imagem'])."'></td>";
		echo "<td>".$linha['resultado']."</td>";
		echo "<td>".$linha['data']."</td>";
		echo "<td>".$linha['hora']."</td>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<section>";
	$max=$produtopa->retornarUltimo();
	if ($fim<$max) {
		$inicio=$fim+1;
		echo "<form action='listar_exames.php' method='POST'>";
		echo "<input type='hidden' name='inicio' value='$inicio'>";
		echo "<input type='submit' name='botao' value='Mais...' class='mais'>";
		echo "</form>";
	}
	echo "</section>";
}
?>
</body>
</html>