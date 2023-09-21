<?php
	if (isset($_COOKIE['admin'])) {
		setcookie("admin","");
		echo "<meta http-equiv='refresh' content='0.5;url=/PROJETO_INTEGRADOR/'>";	
	} 

	if (isset($_COOKIE['dentista'])) {
		setcookie("dentista","");
		echo "<meta http-equiv='refresh' content='0.5;url=/PROJETO_INTEGRADOR/'>";
	}

	if (isset($_COOKIE['paciente'])) {
		setcookie("paciente","");
		echo "<meta http-equiv='refresh' content='0.5;url=/PROJETO_INTEGRADOR/'>";
	}
?>