<?php
require_once 'cabecalho.php';

if (isset($_GET['botao'])&&isset($_GET['busca'])){
     require_once 'persistence/PacientePA.php';
     $pacientepa=new PacientePA();
     $consulta=$pacientepa->buscar($_GET['busca']);
	 if (!$consulta){
	 	echo "<h2>Nenhum Paciente correspondente!</h2>";
	 }else{
	 	echo "<section>";
	 	while ($linha=$consulta->fetch_assoc()){
	 		echo "<div id='painel'>";
	 		echo "<h2>".$linha['nome']."</h2>";
	 		echo "<form action='detalhes.php' method='POST'>";
	 		echo "<input type='hidden' value='".$linha['id_paciente_pk']."' name='id'>";
	 		echo "<input type='submit' name='botao' value='Ver' class='btn'>";
	 		echo "</form>";
	 		echo "</div>";
	 	}
	 	echo "</section>";
	 }
}else{
	echo "<h2>Digite nome do paciente &uarr;</h2>";
}
?>
</body>