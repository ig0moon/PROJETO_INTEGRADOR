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
        echo "<li><a href='administracao.php' class='admin'><span class='material-symbols-outlined'>admin_panel_settings</span></a></li>    <!-- admin -->";
        echo "<li><a href='sairadm.php'><span class='material-symbols-outlined'>logout</span></a></li>                                      <!-- sair -->";

    } else if (isset($_COOKIE['cliente'])) {
        echo "<li class='cpf'>CPF: ".$_COOKIE['cliente']."</li>";
        echo "<li><a href='sair.php'><span class='material-symbols-outlined'>logout</span></a></li>                                         <!-- sair -->";
        echo "<li><a href='carrinho.php' target='quadro'><span class='material-symbols-outlined'>shopping_cart</span></a></li>              <!-- cart -->";

    } else{
        echo "<li><a href='login.php'><span class='material-symbols-outlined'>login</span></a></li>                                         <!-- entrar -->";
        echo "<li><a href='cadastrarcliente.php' target='quadro'><span class='material-symbols-outlined'>person_add</span></a></li>         <!-- cadast -->";
        echo "<li><a href='administracao.php' class='admin'><span class='material-symbols-outlined'>admin_panel_settings</span></a></li>    <!-- admin -->";
        }               
?>

            	<li><a href="/PROJETO_INTEGRADOR/login">Entrar</a></li>
            	<li><a href="/PROJETO_INTEGRADOR/cadpac">Cadastrar</a></li>
                <li><a href="/PROJETO_INTEGRADOR/loginadmin">Admin</a></li>
        	</ul>
        </div>

</section>

<section class="conteudo">
	<iframe src="/PROJETO_INTEGRADOR/home" id="quadro" name="quadro"></iframe>
</section>

</body>
</html>