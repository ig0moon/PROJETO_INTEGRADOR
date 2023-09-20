<?php
require_once 'cabecalho.php';

if (isset($_POST['inicio'])){
    $inicio=$_POST['inicio'];
    $fim=$inicio+4;
}else{
    $inicio=1;
    $fim=5;
}

require_once 'persistence/ConsultaPA.php';
$consultapa=new consultaPA();
$consulta=$consultapa->listar($inicio,$fim);
if (!$consulta){
    echo "<h2>Consulta não encontrada!</h2>";
}else{
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>situacao</th>";
    echo "<th>Descricao</th>";
    echo "<th>Valor</th>";
    echo "<th>Hora</th>";
    echo "<th>Diagnostico</th>";
    echo "<th>Data</th>";
    echo "<th>Receita medica</th>";
    echo "</th>";

    while ($linha=$consulta->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$linha['id']."</td>";
        echo "<td>".$linha['situacao']."</td>";
        echo "<td>".$linha['descricao']."</td>";
        echo "<td>".$linha['valor']."</td>";
        echo "<td>".$linha['hora']."</td>";
        echo "<td>".$linha['diagnostico']."</td>";
        echo "<td>".$linha['data']."</td>";
        echo "<td>".$linha['receita medica']."</td>";
        echo "</tr>";
     }
     echo "</table>";

    echo "<section>";
    $max=$consultapa->retornarUltimo();
    if ($fim<$max){
        $inicio=$fim+1;
        echo "<form action='listarconsulta.php' method='POST'>";
        echo "<input type='hidden' name='inicio'
         value='$inicio'>";
          echo "</form>";
        }
        echo "</section>";
 }
 ?>
</body>
</html>
