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

	case '/PROJETO_INTEGRADOR/admin':
		require_once './principaladm.php';
		break;

	case '/PROJETO_INTEGRADOR/sairadmin':
		require_once './sairadm.php';
		break;

	case '/PROJETO_INTEGRADOR/login':
		require_once './login_paciente.php';
		break;

	case '/PROJETO_INTEGRADOR/loginadmin':
		require_once './logaradmin.php';
		break;

	case '/PROJETO_INTEGRADOR/cadden':
		require_once './cadastrardentista.php';
		break;

	case '/PROJETO_INTEGRADOR/cadex':
		require_once './cadastrarexame.php';
		break;

	case '/PROJETO_INTEGRADOR/cadpac':
		require_once './cadastrarpaciente.php';
		break;

	case '/PROJETO_INTEGRADOR/listarpac':
		require_once './listarpaciente.php';
		break;

	case '/PROJETO_INTEGRADOR/listarden':
		require_once './listardentista.php';
		break;

	case '/PROJETO_INTEGRADOR/listarex':
		require_once './listar_exames.php';
		break;

	case '/PROJETO_INTEGRADOR/listcon':
		require_once './listarconsulta.php';
		break;

	default:
		require_once './principal.php';
		break;
}

?>