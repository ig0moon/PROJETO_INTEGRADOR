<?php

$url=$_SERVER['REQUEST_URI'];

switch ($url) {
	case '/PROJETO_INTEGRADOR/':
		require_once './principal.php';
		break;
	default:
		require_once './principal.php';
		break;
}

?>