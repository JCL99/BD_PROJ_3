<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $local1 = $_REQUEST['local1'];
    $local2 = $_REQUEST['local2'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECTid, zona, imagem, lingua, ts, descricao FROM anomalia NATURAL JOIN incidencia NATURAL JOIN local_publico;";

        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<h1> Anomalias entre locais <h1>");
        echo("<table border=\"1\">\n");
        echo("<tr align='center'><td>ID</td><td>Zona</td><td>Imagem</td><td>Lingua</td><td>Timestamp</td><td>Descricao</td></tr>\n"$
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
            echo("</tr>\n");
        }
        //echo("<tr><td><a href=\"pageInsertLocal.php\">Novo</a></td><td></td><td></td><td></td></tr>");
        echo("</table>\n");

        $db = null;

        exit;
    }
    catch (PDOException $e)
    {
        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<p>ERROR: Nao foi possivel efetuar a operacao.</p>");
    }
?>
    </body>
</html>
