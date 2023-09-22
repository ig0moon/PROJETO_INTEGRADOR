<?php
	require_once 'cabecalho.php';

    if (isset($_COOKIE['paciente'])) {

        echo "<div id='painel'>";
        
        echo "<p><a href='/PROJETO_INTEGRADOR/listarden' target='quadro' title='Listar Dentistas'>
        <span class='material-symbols-outlined'>dentistry</span><span class='material-symbols-outlined'>list</span> Listar Dentistas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarcon' target='quadro' title='Listar Consultas'>
        <span class='material-symbols-outlined'>prescriptions</span><span class='material-symbols-outlined'>list</span> Listar Consultas</a></p>";

        echo "<p><a href='/PROJETO_INTEGRADOR/listarex' target='quadro' title='Listar Exames'>
        <span class='material-symbols-outlined'>vital_signs</span><span class='material-symbols-outlined'>list</span> Listar Exames</a></p>";

        }               
?>
        	</ul>
        </div>

</section>

</body>
</html>