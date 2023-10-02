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

        echo "<li><a href='/PROJETO_INTEGRADOR/admin' target='quadro' title='Painel Admin'>
        <span class='material-symbols-outlined'>admin_panel_settings</span></a></li>";
        
        echo "<li><a href='/PROJETO_INTEGRADOR/sair' title='Sair'>
        <span class='material-symbols-outlined'>logout</span></a></li>";

    } else if (isset($_COOKIE['paciente'])) {

        echo "<li class='cpf'><p>Paciente: ".$_COOKIE['paciente']."</p></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/paciente' target='quadro'><span class='material-symbols-outlined'>personal_injury</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/sair'><span class='material-symbols-outlined'>logout</span></a></li>";

    } else if (isset($_COOKIE['dentista'])) {

        echo "<li class='cpf'><p>CRM: ".$_COOKIE['dentistacrm']."</p></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/dentista' target='quadro'><span class='material-symbols-outlined'>dentistry</span></a></li>";

        echo "<li><a href='/PROJETO_INTEGRADOR/sair'><span class='material-symbols-outlined'>logout</span></a></li>";

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