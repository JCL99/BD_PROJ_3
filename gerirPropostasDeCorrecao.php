<html>
<link rel="stylesheet" href="styles.css">
    <body>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;

        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM proposta_de_correcao;";
        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<h1> Propostas de Correcao <h1>");
        echo("<table border=\"1\">\n");
        echo("<tr align='center'><td>E-mail</td><td>Numero</td><td>Data e Hora</td><td>Texto</td><td>Editar</td><td>Apagar</td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row[0]);
            echo("</td><td>");
            echo($row[1]);
            echo("</td><td>");
            echo($row[2]);
            echo("</td><td>");
            echo($row[3]);
            echo("</td>");
	    echo("<td><a href=\"pageEditPropostaCorrecao.php?mailToEdit={$row[0]}&nroToEdit={$row[1]}&datahoraToEdit={$row[2]}&textoToEdit={$row[3]}\">Editar</a></td>\n");
            echo("<td><a href=\"removePropostaCorrecao.php?umail={$row[0]}&num={$row[1]}\">Apagar</a></td>\n");
	    echo("<tr>\n");
        }
	
       	echo("<tr><td colspan=5 align='center'><a href=\"pageInsertPropostaCorrecao.php\"> Nova Proposta de Correcao </a></td></tr>");
	echo("</table>\n");

        $db = null;

    }
    catch (PDOException $e)
    {
        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<p>ERROR: Nao foi possivel efetuar a operacao.</p>");
    }
?>
    </body>
</html>
