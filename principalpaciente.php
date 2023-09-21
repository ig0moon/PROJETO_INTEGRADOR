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
    if (isset($_COOKIE['paciente'])) {

        echo "<li class='cpf'><p>CPF: ".$_COOKIE['paciente']."</p></li>";;
        
        echo "<li><a href='/PROJETO_INTEGRADOR/listarden' target='quadro' title='Listar Dentistas'>
        <span class='material-symbols-outlined'>dentistry</span><span class='material-symbols-outlined'>list</span></a></li>";

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

<section class="conteudo">
    <iframe src="/PROJETO_INTEGRADOR/home" id="quadro" name="quadro"></iframe>
</section>

</body>
</html>