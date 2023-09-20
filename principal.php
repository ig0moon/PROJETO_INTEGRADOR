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
        echo "<li><a href='/PROJETO_INTEGRADOR/cadden' target='quadro'>Cadastrar Dentista</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/listarden' target='quadro'>Listar Dentista</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/cadpac' target='quadro'>Cadastrar Paciente</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/listarpac' target='quadro'>Listar Paciente</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/cadcon' target='quadro'>Cadastrar Consulta</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/listarcon' target='quadro'>Listar Consulta</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/cadex' target='quadro'>Cadastrar Exame</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/listarex' target='quadro'>Listar Exame</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/sairadmin'>Sair</a></li>";

    } else if (isset($_COOKIE['cliente'])) {
        echo "<li class='cpf'>CPF: ".$_COOKIE['cliente']."</li>";
        echo "<li><a href='sair.php'><span class='material-symbols-outlined'>logout</span></a></li>                                         <!-- sair -->";
        echo "<li><a href='carrinho.php' target='quadro'><span class='material-symbols-outlined'>shopping_cart</span></a></li>              <!-- cart -->";

    } else{
        echo "<li><a href='/PROJETO_INTEGRADOR/login'>Entrar</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/cadpac'>Cadastrar</a></li>";
        echo "<li><a href='/PROJETO_INTEGRADOR/loginadmin'>Admin</a></li>";
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