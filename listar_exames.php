<?php
require_once 'cabecalho.php';
?>

    <h2>Exames</h2>

<?php
if (isset($_POST['inicio'])) {
	$inicio=$_POST['inicio'];
	$fim=$inicio+4;
}else{
	$inicio=1;
	$fim=5;
}

require_once 'persistence/ExamePA.php';
$examepa=new ExamePA();
$consultar=$examepa->listar_inicio_fim($inicio,$fim);
if(!$consultar){
	echo "<h2>Não há nenhum exame cadastrado no sistema.</h2>";
}else{
	
	require_once 'buscaex.php';

	echo "<table>";
	echo "<tr>";
	echo "<th>Id examen</th>";
	echo "<th>dentista</th>";
	echo "<th>paciente</th>";
	echo "<th>Tipo</th>";
	echo "<th>Descrição</th>";
	echo "<th>Resultado</th>";
	echo "<th>Hora</th>";
	echo "<th>Data agenda</th>";
	// echo "<th>Imagem</th>";
	echo "</tr>";

	while ($linha=$consultar->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$linha['id_examen_pk']."</td>";
		echo "<td>".$linha['id_dentista_fk']."</td>";
		echo "<td>".$linha['id_paciente_fk']."</td>";
		echo "<td>".$linha['tipo']."</td>";
		echo "<td>".$linha['descricao']."</td>";
		echo "<td>".$linha['resultado']."</td>";
		echo "<td>".$linha['hora']."</td>";
		echo "<td>".$linha['data_agenda']."</td>";
		// echo "<td><div><img src='data:image/jpg;base64,".base64_encode($linha['imagem'])."'></div></td>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<section>";
	$max=$examepa->retornarUltimo();
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