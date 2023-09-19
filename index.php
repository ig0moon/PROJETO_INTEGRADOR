<?php

$url=$_SERVER['REQUEST_URI'];
// var_dump($url);
switch ($url) {
	case '/PROJETO_INTEGRADOR/home':
		require_once './principal.php';
		break;
	default:
		require_once './principal.php';
		break;
}

?>