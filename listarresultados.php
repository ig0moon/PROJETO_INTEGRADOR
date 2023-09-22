<?php
	require_once 'cabecalho.php';

	if(isset($_POST['inicio'])){
		$inicio=$_POST['inicio'];
		$fim=$inicio+4;

	} else{
		$inicio=1;
		$fim=5;
	}

	require_once 'persistence/ExamePA.php';
	$examepa=new ExamePA();
	$resultados=$examepa->listarResultado($inicio,$fim);
	if (!$resultados){
		echo "<h2>Ainda não tem resultados.</h2>";

	}else{
		echo "<table>";
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Resultado</th>";
		echo "</tr>";

		while ($linha=$resultados->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$linha['id_examen_pk']."</td>";
			echo "<td>".$linha['resultado']."</td>";
			echo "</tr>";
		}
		echo "</table>";

	echo "<section>";
    $max=$examepa->retornarUltimo();
    if ($fim<$max){
        $inicio=$fim+1;
        echo "<form action='listarresultados.php' method='POST'>";
        echo "<input type='hidden' name='inicio'
         value='$inicio'>";
          echo "</form>";
        }
        echo "</section>";
 }
?>
</body>

