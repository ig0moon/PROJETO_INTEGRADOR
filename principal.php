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