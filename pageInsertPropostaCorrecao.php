<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
        <h3>Inserir Correcao</h3>
        <form action="insertPropostaCorrecao.php" method="post">
	  <p>E-mail: <input type="text" name="mail"/></p>
	  <p>Numero: <input type="text" name="numero"/></p>
        <p>Data e Hora: <input type="datetime" value="<?php echo date("Y-m-d\ H:i:s",$ts); ?>" name="dataHora"/></p>
         <p>Texto: <input type="text" name="texto"/></p>
          <p><input type="submit" value="Submit"/></p>
        </form>

    </body>
</html>
