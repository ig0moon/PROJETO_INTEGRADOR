<?php

if (isset($_COOKIE['admin'])) {
	header('Location: /PROJETO_INTEGRADOR/admin');
}else{
	header('Location: /PROJETO_INTEGRADOR/loginadmin');
}

if(isset($_COOKIE['cliente'])){
	header('Location: /PROJETO_INTEGRADOR/home');
}

?>