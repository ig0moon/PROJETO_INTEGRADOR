<?php
	require_once 'cabecalho.php';
?>

<section class="header">

        <div id="logo">
            <a href="/PROJETO_INTEGRADOR/home" target="quadro"><img src="img/icone-index.png"></a>
        </div>

        <div id="titulo">
             <h1><span>O</span>maga<br/>Clínica Odontológica</h1>
        </div>
    
    <div id="links">
        <ul class="nav">

<?php
    if (isset($_COOKIE['dentista'])) {

        echo "<li><a href='/PROJETO_INTEGRADOR/listarpac' target='quadro' title='Listar Pacientes'>
         <span class='material-symbols-outlined'>personal_injury</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/listarcon' target='quadro' title='Listar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/listarex' target='quadro' title='Listar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/sair' title='Sair'>
        <span class='material-symbols-outlined'>logout</span></a></li>";
    }
?>

        </ul>
    </div>
</section>

</body>
</html>