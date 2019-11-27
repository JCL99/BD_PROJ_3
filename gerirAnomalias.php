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

        $sql = "SELECT * FROM anomalia;";
        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<h1> Anomalias <h1>");
        echo("<table border=\"1\">\n");
        echo("<tr align='center'><td>ID</td><td>Zona</td><td>Imagem</td><td>Lingua</td><td>Timestamp</td><td>Descricao</td><td>Tem anomalia de redacao</td><td>Apagar</td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row[0]);
            echo("</td><td>");
            echo($row[1]);
            echo("</td>");
	    echo("<td>");
            echo($row[2]);
            echo("</td>");
	    echo("<td>");
            echo($row[3]);
            echo("</td>");
	    echo("<td>");
            echo($row[4]);
            echo("</td>");
	    echo("<td>");
            echo($row[5]);
            echo("</td>");
	    echo("<td>");
            echo($row[6]);
            echo("</td>");
	    echo("<td><a href=\"removeAnomalia.php?idToRemove={$row[0]}\">Apagar</a></td>\n");
            echo("<tr>\n");
        }
	//echo("<tr><td><a href=\"pageInsertLocal.php\">Novo</a></td><td></td><td></td><td></td></tr>");
       	echo("<tr><td colspan=8 align='center'><a href=\"pageInsertAnomalia.php\"> Nova Anomalia </a></td></tr>");
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
