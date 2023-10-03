<?php
require_once 'cabecalho.php';
?>

	<div id="painel">

<?php
if(isset($_POST['botao'])&&isset($_POST['idP'])){
	require_once 'model/Paciente.php';
	require_once 'persistence/PacientePA.php';
	$pacientepa=new PacientePA();
	$paciente=new Paciente();
	$consulta=$pacientepa->buscarPorId($_POST['idP']);
	if(!$consulta){
		echo"<h2>Favor selecionar um cliente</h2>";
	}else{
		while ($linha=$consulta->fetch_assoc()) {
			$paciente->setId_paciente_pk($linha['id_paciente_pk']);
			$paciente->setNome($linha['nome']);
			$paciente->setTelefone($linha['telefone']);
			$paciente->setSenha($linha['senha']);
			$paciente->setCpf($linha['cpf']);
			$paciente->setEmail($linha['email']);
			$paciente->setEndereco($linha['endereco']);
		}
	}

	
?>
	<section class="detalhes">
		<h3>Paciente</h3>
		<p>Nome: <?= $paciente->getNome()?></p>
		<p>Telefone: <?= $paciente->getTelefone()?></p>
		<p>cpf: <?= $paciente->getcpf()?></p>
		<p>Email: <?= $paciente->getEmail()?></p>
		<p>Endereço: <?= $paciente->getEndereco()?></p>
	</section>
<?php
	
	require_once 'persistence/ExamePA.php';
$examepa=new ExamePA();
$consultar=$examepa->buscarPorIdPaciente($paciente->getId_paciente_pk());
echo"</div>";
echo"<div id='painel'>";
echo"<p>Exames:</p>";
echo "</div>";
if(!$consultar){
	echo "<h2>Não há nenhum exame cadastrado nesse paciente.</h2>";
}else{
	echo "<table>";
	echo "<tr>";
	echo "<th>Id examen</th>";
	echo "<th>dentista</th>";
	echo "<th>paciente</th>";
	echo "<th>Tipo</th>";
	echo "<th>Descrição</th>";
	echo "<th>Resultado</th>";
	echo "<th>Hora</th>";
	echo "<th>Data agenda</th>";
	/*echo "<th>Detalhes</th>";*/
	echo "</tr>";
	while ($linha=$consultar->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$linha['id_examen_pk']."</td>";
		$aux=$examepa->converteIdParaNomeDentista($linha['id_dentista_fk']);
		$linhaG=$aux->fetch_assoc();
		echo "<td>".$linhaG['nome']."</td>";
		$aux=$examepa->converteIdParaNomePaciente($linha['id_paciente_fk']);
		$linhaG=$aux->fetch_assoc();
		echo "<td>".$linhaG['nome']."</td>";
		//echo "<td>".$linha['id_dentista_fk']."</td>";
		//echo "<td>".$linha['id_paciente_fk']."</td>";
		echo "<td>".$linha['tipo']."</td>";
		echo "<td>".$linha['descricao']."</td>";
		echo "<td>".$linha['resultado']."</td>";
		echo "<td>".$linha['hora']."</td>";
		echo "<td>".$linha['data_agenda']."</td>";
		/*echo "<td>
			<form action='detalhes.php' method='POST'>"."
			<input type='hidden' name='idP' value='".$linha['id_paciente_fk']."'>
			<div id='alterar'>
			<input style='margin-left:0px;width:8vw;' type='submit' name='botao' value='Ver mais'>
			</div>
			</form>
			</td>";*/
		echo "</tr>";
	}
	echo "</table>";
}
	require_once 'persistence/ConsultaPA.php';
$consultapa=new consultaPA();
$consulta=$consultapa->buscarPorIdPaciente($paciente->getId_paciente_pk());
echo"<div id='painel'><h3>Consultas:</h3></div>";
if (!$consulta){
    echo "<h2>Não há nenhum exame cadastrado nesse paciente.</h2>";
}else{

    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Dentista</th>";
    echo "<th>Paciente</th>";
    echo "<th>Diagnostico</th>";
    echo "<th>Data</th>";
    echo "<th>Valor</th>";
    echo "<th>Situacao</th>";
    echo "<th>Hora</th>";
    echo "<th>Receita medica</th>";
    echo "<th>Procedimento</th>";
    /*echo "<th>Detalhes</th>";*/
    echo "</tr>";
    while ($linha=$consulta->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$linha['id_consulta_pk']."</td>";
        //echo "<td>".$linha['id_dentista_fk']."</td>";
        //echo "<td>".$linha['id_paciente_fk']."</td>";
        $aux=$consultapa->converteIdParaNomeDentista($linha['id_dentista_fk']);
		$linhaG=$aux->fetch_assoc();
		echo "<td>".$linhaG['nome']."</td>";
		$aux=$consultapa->converteIdParaNomePaciente($linha['id_paciente_fk']);
		$linhaG=$aux->fetch_assoc();
		echo "<td>".$linhaG['nome']."</td>";
        echo "<td>".$linha['diagnostico']."</td>";
        echo "<td>".$linha['data']."</td>";
        echo "<td>".$linha['valor']."</td>";
        echo "<td>".$linha['situacao']."</td>";
        echo "<td>".$linha['hora']."</td>";
        echo "<td>".$linha['receita_medica']."</td>";
        echo "<td>".$linha['descricao']."</td>";
        /*echo "<td>
			<form action='detalhes.php' method='POST'>"."
			<input type='hidden' name='idP' value='".$linha['id_paciente_fk']."'>
			<div id='alterar'>
			<input style='margin-left:0px;width:8vw;' type='submit' name='botao' value='Ver mais'>
			</div>
			</form>
			</td>";*/
        echo "</tr>";
     }
     echo "</table>";
}
	
/*
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

}*/
}else{
		echo"<h2>Nenhum paciente encontrado</h2>";
	}
?>
</div>
</body>
</html> 