<?php

$url=$_SERVER['REQUEST_URI'];
// var_dump($url);
switch ($url) {
	case '/PROJETO_INTEGRADOR/':
		require_once './principal.php';
		break;
	case '/PROJETO_INTEGRADOR/home':
		require_once './home.php';
		break;
	case '/PROJETO_INTEGRADOR/login':
		require_once './login_paciente.php';
		break;
	case '/PROJETO_INTEGRADOR/cadastro':
		require_once './cadastrarpaciente.php';
		break;
	default:
		require_once './principal.php';
		break;
}

?>