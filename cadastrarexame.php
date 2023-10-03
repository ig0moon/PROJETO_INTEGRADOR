<?php
require_once 'cabecalho.php';
?>
<?php //phpinfo(); ?>
<div id="painel">
	<form action="cadastrarexame.php" method="POST" enctype="multipart/form-data" class="normal">
	
	<h2>Cadastrar Exame</h2>
	<?php
		require_once "model/Paciente.php";
		require_once "persistence/PacientePA.php";
		echo"<p>Pacientes</p>";
		echo "<select name='pacientes' required>";
		$paciente=new Paciente();
		$pacientepa=new PacientePA();
		$consultaP=$pacientepa->listar();
		while($linha=$consultaP->fetch_assoc()){
			$paciente->setId_paciente_pk($linha['id_paciente_pk']);
			$paciente->setNome($linha['nome']);
			echo "<option value='".$paciente->getId_paciente_pk()."'>".$paciente->getNome()."</option>";
			}
		echo "</select>";
		require_once "model/Dentista.php";
		require_once "persistence/DentistaPA.php";
		echo"<p>Dentista</p>";
		echo "<select name='dentistas' required>";
		$Dentista=new Dentista();
		$Dentistapa=new DentistaPA();
		$consultaD=$Dentistapa->listar();
		while($linha=$consultaD->fetch_assoc()){
			$Dentista->setId_Funcionario_Pk($linha['id_funcionario_pk']);
			$Dentista->setNome($linha['nome']);
			echo "<option value='".$Dentista->getId_Funcionario_Pk()."'>".$Dentista->getNome()."</option>";
			}
		echo "</select>";
	?>
	
	<p>Tipo:</p>
	<p><input type="text" name="tipo" size="25" maxlength="30" required></p>

	<p>Descrição:</p>
	<p><input type="text" name="descricao" size="25" maxlength="100" required></p>

	<p>Resultado:</p>
	<p><input type="text" name="resultado" size="25" maxlength="100" required></p>

	<p>Hora:</p>
	<p><input type="time" name="hora" size="25" maxlength="25" required></p>

	<p>Data:</p>
	<p><input type="date" name="data" size="25" maxlength="25" required></p>

	<p>Imagem:</p>

	<div id="yourBtn" style="height: 50px; width: 10vw;border: 1px dashed #BBB; cursor:pointer; text-align: center; margin: auto;" onclick="getFile()">Adicionar imagem</div>

  	<div style='height: 0px;width:0px; overflow:hidden;'>
  		<input id="upfile" type="file" value="upload" name="imagem" onchange="sub(this)" required/>
  	</div>

	<p><input class="btn" type="submit" name="botao" value="Cadastrar" onclick="escrever()"></p>


  	<script type="text/javascript">

  	function getFile(){
    	document.getElementById("upfile").click();
	}

	function sub(obj) {
		var file = obj.value;
  		var fileName = file.split("\\");
  		document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
  	}

	</script>

</form>
<?php
	if (isset($_POST['botao'])) {
		$dataatual=strtotime("+3 day");
		$datalimite=strtotime("+3month");
		$datasetada=strtotime($_POST['data']);
		if($dataatual <= $datasetada&&($datalimite>$datasetada)){
			require_once 'model/Exame.php';
			require_once 'persistence/ExamePA.php';
			$exame=new Exame();
			$examepa=new ExamePA();

			$exame->setTipo($_POST['tipo']);
			$exame->setData_agenda($_POST['data']);
			$exame->setHora($_POST['hora']);
			$exame->setId_paciente_fk($_POST['pacientes']);
			$exame->setId_dentista_fk($_POST['dentistas']);
			$exame->setDescricao($_POST['descricao']);
			$exame->setResultado($_POST['resultado']);
			$id=$examepa->retornarUltimo();

			if($id>=0){
				$id++;
			}else{
				$id=1;
			}
			$exame->setId_exame_pk($id);
			$imagem=$_FILES['imagem']['tmp_name'];
			$tamanho=filesize($imagem);
			if($tamanho>2097152||$tamanho==0){
				echo "<h2>A imagem selecionada é muito grande!</h2>";
			}else{
				//$nome_imagem=basename($imagem);
				//var_dump($nome_imagem);
				//$novo_nome=str_replace(" ","_",$nome_imagem);
				//rename($imagem,$novo_nome);
				$imagem=addslashes(file_get_contents($imagem));
				$exame->setImagem($imagem);
				$resp=$examepa->cadastrar($exame);
				if(!$resp){//false
					echo "<h2>Erro na tentativa de Cadastrar! 
					Tente Novamente!</h2>";

				}else{
					echo "<h2>Exame cadastrado com Sucesso!</h2>";
				}
			}
		}else{
			echo"<h2>Favor inserir uma data e horario válido.</h2>";
		}
	}

?>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
	require_once 'rodape.php';
?>
</body>
</html>
