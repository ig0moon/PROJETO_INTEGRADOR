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
    if (isset($_COOKIE['admin'])) {
        // echo "<li><a href='/PROJETO_INTEGRADOR/admin'>Admin</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/cadden' target='quadro' title='Cadastrar Dentistas'>
        <span class='material-symbols-outlined'>dentistry</span><span class='material-symbols-outlined'>add</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/listarden' target='quadro' title='Listar Dentistas'>
        <span class='material-symbols-outlined'>dentistry</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/cadpac' target='quadro' title='Cadastrar Pacientes'>
        <span class='material-symbols-outlined'>personal_injury</span><span class='material-symbols-outlined'>add</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/listarpac' target='quadro' title='Listar Pacientes'>
         <span class='material-symbols-outlined'>personal_injury</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/cadcon' target='quadro' title='Cadastrar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>add</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/listarcon' target='quadro' title='Listar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/cadex' target='quadro' title='Cadastrar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>add</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/listarex' target='quadro' title='Listar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>list</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/sair' title='Sair'>
        <span class='material-symbols-outlined'>logout</span></a></li>";

    } else if (isset($_COOKIE['paciente'])) {
        echo "<li class='cpf'>CPF: ".$_COOKIE['paciente']."</li>";
        echo "<li><a href='sair.php'><span class='material-symbols-outlined'>logout</span></a></li>                                         <!-- sair -->";
        echo "<li><a href='carrinho.php' target='quadro'><span class='material-symbols-outlined'>shopping_cart</span></a></li>              <!-- cart -->";

    } else{
        echo "<li><a href='/PROJETO_INTEGRADOR/login'>Entrar</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/cadpac' target='quadro'>Cadastrar</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/loginadmin'>Admin</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/logindentista'>Dentista</a></li>";
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