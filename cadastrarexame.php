<?php
require_once 'cabecalho.php';
?>

<div id="painel">
	<form action="cadastrarexame.php" method="POST" enctype="multipart/form-data" class="normal">

	<h2>Cadastrar Exame</h2>

	<p>Dentista:</p>
	<p><input type="text" name="id_dentista_fk" size="25" maxlength="25" required></p>

	<p>Paciente:</p>
	<p><input type="text" name="id_paciente_fk" size="25" maxlength="25" required></p>
	
	<p>Tipo:</p>
	<p><input type="text" name="tipo" size="25" maxlength="25" required></p>

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
		require_once 'model/Exame.php';
		require_once 'persistence/ExamePA.php';
		$exame=new Exame();
		$examepa=new ExamePA();

		$exame->setTipo($_POST['tipo']);
		$exame->setData_agenda($_POST['data']);
		$exame->setHora($_POST['hora']);
		$exame->setId_paciente_fk($_POST['id_paciente_fk']);
		$exame->setId_dentista_fk($_POST['id_dentista_fk']);
		$exame->setDescricao($_POST['descricao']);
		$exame->setResultado($_POST['resultado']);
		$id=$examepa->retornarUltimo();

		if($id>=0){
			$id++;
		}else{
			$id=1;
		}
		$exame->setId_examen_pk($id);
		$imagem=$_FILES['imagem']['tmp_name'];
		$tamanho=filesize($imagem);
		if($tamanho>4294967295){
			echo "<h2>A imagem selecionada é muito grande!</h2>";
		}else{
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
