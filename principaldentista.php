<?php
	require_once 'cabecalho.php';

    if (isset($_COOKIE['dentista'])) {

        echo "<div id='painel'>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarpac' target='quadro' title='Listar Pacientes'>
         <span class='material-symbols-outlined'>personal_injury</span><span class='material-symbols-outlined'>list</span> Listar Pacientes</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarcon' target='quadro' title='Listar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>list</span> Listar Consultas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarex' target='quadro' title='Listar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>list</span> Listar Exames</a></p>";
/*
       echo "<p><a href='/PROJETO_INTEGRADOR/listarres' target='quadro' title='Listar Resultados'>
        <span class='material-symbols-outlined'>healing</span><span class='material-symbols-outlined'>list</span> Listar Resultados</a></p>";
*/
        echo "</div>";

    } else {
        echo "<h2>Você não está logado como dentista.</h2>";
    }
?>

</body>
</html>