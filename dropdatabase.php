<?php  
require_once 'cabecalho.php';
?>
<div id="painel">
<form action="dropdatabase.php" method="GET">
	<p>Deletar Banco?</p>
	<p><input type="submit" name="botao" value="Teria Corage"></p>
</form>

</div>
<?php
if (isset($_GET['botao'])) {
	require_once 'persistence/AdminPA.php';
	$adminpa=new AdminPA();
	$adminpa->drop();
	echo "<p>Press F to pay respect</p>";
}

?>










<?php  
require_once 'rodape.php';
?>