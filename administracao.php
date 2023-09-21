<?php

if (isset($_COOKIE['admin'])) {
	header('Location: /PROJETO_INTEGRADOR/admin');
}else{
	header('Location: /PROJETO_INTEGRADOR/loginadmin');
}

if(isset($_COOKIE['paciente'])){
	header('Location: /PROJETO_INTEGRADOR/');
}

if (isset($_COOKIE['dentista'])) {
	header('Location: /PROJETO_INTEGRADOR/dentista');
}

?>