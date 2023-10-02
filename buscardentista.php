<?php
require_once 'cabecalho.php';

if (isset($_GET['botao'])&&isset($_GET['busca'])){
     require_once 'persistence/DentistaPA.php';
     $dentistapa=new DentistaPA();
     $consulta=$dentistapa->buscar($_GET['busca']);
	 if (!$consulta){
	 	echo "<h2>Nenhum Dentista correspondente!</h2>";
	 }else{
	 	echo "<section>";
	 	while ($linha=$consulta->fetch_assoc()){
	 		echo "<div id='painel'>";
	 		echo "<h2>".$linha['nome']."</h2>";
	 	 	var_dump($consultag);
	 	}
	 	echo "</section>";
	 }
}else{
	echo "<h2>Digite nome do dentista &uarr;</h2>";
}
?>
</body>