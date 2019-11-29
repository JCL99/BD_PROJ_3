<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
        <h3>Editar Proposta de Correcao</h3>
        <form action="editPropostaCorrecao.php" method="post">
	  <p><input type="hidden" name="origMail" value="<?=$_REQUEST['mailToEdit']?>"/</p>
	  <p><input type="hidden" name="origNro" value="<?=$_REQUEST['nroToEdit']?>"/</p>
	  <p><input type="hidden" name="origDataHora" value="<?=$_REQUEST['datahoraToEdit']?>"/</p>
    <p><input type="hidden" name="origTexto" value="<?=$_REQUEST['textoToEdit']?>"/</p>

	  <p>E-mail: <?php echo($_REQUEST['mailToEdit']); ?></p>
	  <p>Numero: <?php echo($_REQUEST['nroToEdit']); ?></p>
    <p>Data e Hora: <input type="datetime" value="<?php echo date("Y-m-d\ H:i:s",$ts); ?>" name="dataHora"/></p>
    <p>Texto: <input type="text" name="texto"/></p>
    
    <p><input type="submit" value="Submit"/></p>
        </form>

    </body>
</html>
