<?php
	require_once 'cabecalho.php';

    if (isset($_COOKIE['admin'])) {
    
        echo "<div id='painel'>";

        echo "<p><a href='/PROJETO_INTEGRADOR/cadden' target='quadro' title='Cadastrar Dentistas'>
        <span class='material-symbols-outlined'>dentistry</span><span class='material-symbols-outlined'>add</span> Cadastrar Dentistas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarden' target='quadro' title='Listar Dentistas'>
        <span class='material-symbols-outlined'>dentistry</span><span class='material-symbols-outlined'>list</span> Listar Dentistas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/cadpac' target='quadro' title='Cadastrar Pacientes'>
        <span class='material-symbols-outlined'>personal_injury</span><span class='material-symbols-outlined'>add</span> Cadastrar Pacientes</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarpac' target='quadro' title='Listar Pacientes'>
         <span class='material-symbols-outlined'>personal_injury</span><span class='material-symbols-outlined'>list</span> Listar Pacientes</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/cadcon' target='quadro' title='Cadastrar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>add</span> Cadastrar Consultas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarcon' target='quadro' title='Listar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>list</span> Listar Consultas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/cadex' target='quadro' title='Cadastrar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>add</span> Cadastrar Exames</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarex' target='quadro' title='Listar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>list</span> Listar Exames</a></p>";

        echo "</div>";

    } else {
        echo "<h2>Você não está logado como administrador.</h2>";
    }
?>

<div id="drop">
    <p><a href="dropdatabase.php"><span class="material-symbols-outlined">arrow_drop_down</span><span class="material-symbols-outlined">database</span></a></p>
</div>

</body>
</html>