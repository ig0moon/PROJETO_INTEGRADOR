<?php
require_once 'cabecalho.php';
?>

	<div id="painel">

<?php
if (isset($_POST['botao'])&&isset($_POST['id'])) {
	require_once 'model/Exame.php';
	require_once 'persistence/ExamePA.php';
	$exame=new Exame();
	$examepa=new ExamePA();

	$consulta=$examepa->buscarPorId($_POST['id']);
	if (!$consulta) {
		echo "<h2>Exame não encontrado.</h2>";
	}else{
		while ($linha=$consulta->fetch_assoc()) {
			//var_dump($linha);
			$exame->setId_exame_pk($linha['id_examen_pk']);
			$exame->setId_dentista_fk($linha['id_dentista_fk']);
			$exame->setId_paciente_fk($linha['id_paciente_fk']);
			$exame->setTipo($linha['tipo']);
			$exame->setDescricao($linha['descricao']);
			$exame->setResultado($linha['resultado']);
			$exame->setHora($linha['hora']);
			$exame->setData_agenda($linha['data_agenda']);
			$exame->setImagem($linha['imagem']);
		}
		$aux=$exame->getId_dentista_fk();
?>
	<section class="detalhes">

		<p>ID: <?= $exame->getId_exame_pk() ?></p>

		<p>Denstista: <?php 
		
		$aux=$examepa->converteIdParaNomeDentista($aux);
		$linhaG=$aux->fetch_assoc();
		echo $linhaG['nome']; 
	?>
		
	</p>
	<p>Paciente: 

	<?php
	$aux=$exame->getId_paciente_fk();
	$aux=$examepa->converteIdParaNomePaciente($aux);
	$linhaG=$aux->fetch_assoc();

	echo $linhaG['nome'];

	?>

	</p>

	<p>Tipo de exame: <?= $exame->getTipo() ?>

		<div id="img_produto">
			<img src="data:img/jpg;base64,<?= base64_encode($exame->getImagem()) ?>">
		</div>

		<p><?= $exame->getDescricao()?></p>

		<p>Resultado: <?= $exame->getResultado() ?></p>

		<p>Data e hora: <?= $exame->getData_agenda() ?> às <?= $exame->getHora() ?></p>

	</section>

<?php
	}

}else{
	echo "<h2>Deve escolher um examen.</h2>";

}

?>
</div>
</body>
</html> 