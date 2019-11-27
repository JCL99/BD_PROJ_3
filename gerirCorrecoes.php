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

        $sql = "SELECT * FROM correcao;";
        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<h1> Correcoes <h1>");
        echo("<table border=\"1\">\n");
        echo("<tr align='center'><td>E-mail</td><td>Numero</td><td>ID Anomalia</td><td>Editar</td><td>Apagar</td></tr>\n");
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
	    echo("<td><a href=\"pageEditCorrecao.php?mailToEdit={$row[0]}&nroToEdit={$row[1]}&a_idToEdit={row[2]}\">Editar</a></td>\n");
            echo("<td><a href=\"removeCorrecao.php?umail={$row[0]}&num={$row[1]}&a_id={$row[2]}\">Apagar</a></td>\n");
	    echo("<tr>\n");
        }
	
       	echo("<tr><td colspan=5 align='center'><a href=\"pageInsertCorrecao.php\"> Nova Correcao </a></td></tr>");
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
