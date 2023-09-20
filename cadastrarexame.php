<?php
require_once 'cabecalho.php';
?>
<form action="cadastrarexame.php" method="POST" 
enctype="multipart/form-data" class="normal">
	<h1>Cadastrar Exame</h1>
	<p>Tipo:<input type="text" name="nome" 
		size="25" maxlength="25" required></p>
	<p>Descrição:</p>
	<p><textarea name="descricao" rows="5" cols="100" required>
	</textarea></p>
	<p>Resultado:<p><textarea name="descricao" rows="5" cols="100" required>
	</textarea></p>
	<p>Imagem:</p>
	<p><input type="file" name="imagem" required></p>
	<p><input type="submit" name="botao" value="Cadastrar" 
     onclick="escrever()"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Exame.php';
		require_once 'persistence/ExamePA.php';
		$exame=new Exame();
		$examepa=new ExamePA();

		$exame->setNome($_POST['nome']);
		$exame->setDescricao($_POST['descricao']);
		$exame->setResultado($_POST['valor']);
		$id=$examepa->retornarUltimo();
		if($id>=0){
			$id++;
		}else{
			$id=1;
		}
		$exame->setId($id);
		$imagem=$_FILES['imagem']['tmp_name'];
		$tamanho=filesize($imagem);
		if($tamanho>65535){
			echo "<h2>A imagem selecionada é muito grande!</h2>";
		}else{
			$imagem=addslashes(file_get_contents($imagem));
			$exame->setImagem($imagem);
			$resp=$examepa->cadastrar($exame);
			if(!$resp){//false
				echo "<h2>Erro na tentativa de Cadastrar! 
				Tente Novamente!</h2>";

			}else{
				echo "<h2>Produto cadastrado com Sucesso!</h2>";
			}
		}
	}

?>
</body>
</html>
