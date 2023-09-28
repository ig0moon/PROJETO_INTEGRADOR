<?php
	require_once 'cabecalho.php'
?>

<div id="painel">

	<form action="cadastrardentista.php" method="POST" enctype="multipart/form-data">

		<h2>Cadastrar Dentista</h2>
        
		<p>Nome:</p>
		<p><input type="text" name="nome" size="50" pattern="[A-Za-z\sãÃéÉÇç]{3,50}" maxlength="50"  required></p>

		<p>Especialidade:</p>
		<p><input type="text" name="especialidade" size="25" pattern= "[A-Za-z\sãÃÁáÉéÍíÇç]{5,20}" maxlength="25" required></p>  

		<p>Endereço:</p>
		<p><input type="text" name="endereco" size="100" pattern="[A-Za-z\sãÃéçÇÉ0-9]{10,100}" maxlength="100" required></p>

		<p>Telefone:</p>
		<p><input type="text" name="telefone" size="14"  pattern= "[0-9]{4,20}" maxlength="14" placeholder="xx xxxxx-xxxx" required></p>

		<p>E-mail:</p>
		<p><input type="text" name="email" size="50" pattern= "[A-Za-z\sãÃéÉ0-9@.]{5,50}" maxlength="50" required></p>

		<p>CPF:</p>
		<p><input type="text" name="cpf" size="25" pattern= "[0-9]{11,11}" maxlength="25" placeholder="11 números" required></p>

		<p>CRM:</p>
		<p><input type="number" name="crm" size="14" pattern= "[0-9]{14,14}" maxlength="14" placeholder="14 números" required></p>

		<p><input class="btn" type="submit" name="botao" value="Cadastrar"></p>
	</form>


<?php

	if (isset($_POST['botao'])){
		require_once 'model/Dentista.php';
		require_once 'persistence/DentistaPA.php';
		$dentista=new Dentista();
		$dentistapa=new DentistaPA();

		$dentista->setCpf($_POST['cpf']);
		$dentista->setEspecialidade($_POST['especialidade']);
		$dentista->setNome($_POST['nome']);
		$dentista->setEndereco($_POST['endereco']);
		$dentista->setTelefone($_POST['telefone']);
		$dentista->setEmail($_POST['email']);
		$dentista->setCrm($_POST['crm']);

		$id=$dentistapa->retornarUltimo();
		if ($id>0){
			$id++;
		} else{
			$id=1;
		}
		$dentista->setId_Funcionario_Pk($id);
		
		$resp=$dentistapa->cadastrar($dentista);
		if (!$resp){
			echo "<h2>Erro na tentativa de cadastrar! Tente novamente!</h2>";
		} else{
			echo "<h2>Dentista cadastrado com sucesso!</h2>";
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
<?php
	require_once 'rodape.php';
?>