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

	case '/PROJETO_INTEGRADOR/dentista':
		require_once './principaldentista.php';
		break;

	case '/PROJETO_INTEGRADOR/paciente':
		require_once './principalpaciente.php';
		break;

	case '/PROJETO_INTEGRADOR/sair':
		require_once './sair.php';
		break;

	case '/PROJETO_INTEGRADOR/login':
		require_once './login_paciente.php';
		break;

	case '/PROJETO_INTEGRADOR/loginadmin':
		require_once './logaradmin.php';
		break;

	case '/PROJETO_INTEGRADOR/logindentista':
		require_once './login_dentista.php';
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

	case '/PROJETO_INTEGRADOR/cadcon':
		require_once './cadastrarconsulta.php';
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

	case '/PROJETO_INTEGRADOR/listarcon':
		require_once './listarconsulta.php';
		break;

	case '/PROJETO_INTEGRADOR/listarres':
		require_once './listarresultados.php';
		break;

	case '/PROJETO_INTEGRADOR/alterarpac':
		require_once './alterarpaciente.php';
		break;

	case '/PROJETO_INTEGRADOR/alterarden':
		require_once './alterardentista.php';
		break;

	case '/PROJETO_INTEGRADOR/detalhes':
		require_once './detalhes.php';
		break;

	case '/PROJETO_INTEGRADOR/ajuda':
		require_once './ajuda.php';
		break;

	case '/PROJETO_INTEGRADOR/sobre':
		require_once './sobre.php';
		break;

	default:
		require_once './principal.php';
		break;
}

?>