<?php
require_once 'cabecalho.php';

if (isset($_POST['id_examen_pk'])&& isset($_POST['botao'])) {
	require_once 'model/Exame.php';
	require_once 'persistence/ExamePA.php';
	$exame=new Exame();
	$examepa=new ExamePA();
	$consulta=$examepa->buscarPorId($_POST['id_examen_pk']);
	if (!$consulta) {
		echo "<h2>Exame não encontrado</h2>";
	}else{
		while ($linha=$consulta->fetch_assoc()) {
			$exame->setId_examen_pk($linha['id_examen_pk']);
			$exame->setId_dentista_fk($linha['id_dentista_pk']);
			$exame->setId_paciente_fk($linha['id_paciente_fk']);
			$exame->setTipo($linha['tipo']);
			$exame->setDescricao($linha['descricao']);
			$exame->setResultado($linha['resultado']);
			$exame->setHora($linha['hora']);
			$exame->setData_agenda($linha['data_agenda']);
			$exame->setImagem($linha['imagem']);
		}
?>
	<section class="detalhes">
		<div id="img_produto">
			<img src="data:img/jpg;base64,<?= base64_encode($exame->getImagem()) ?>">
		</div>
	</section>
	<section class="descricao">
		<p><?= $exame->getDescricao()?></p>
	</section>

<?php
	}

}else{
	echo "<h2>Deve escolher um examen</h2>";

}

?>
</body>
</html>