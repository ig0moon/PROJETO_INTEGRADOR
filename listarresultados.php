<?php  
require_once 'cabecalho.php';
require_once 'model/Exame.php';

if (isset($_COOKIE['resultado'])) {
	$exame=new Exame();
	$consulta=$exame->setResultado($resultado);
	echo "<h2>".$consulta->getResultado()."</h2>";
	$consulta=$exame->setResultado($resultado);
}else{
	if (!$consulta) {
		echo "<h2>gei</h2>";
	}
}


?>