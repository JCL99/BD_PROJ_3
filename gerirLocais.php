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

        $sql = "SELECT nome,latitude,longitude FROM local_publico;";
        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<h1> Locais <h1>");
        echo("<table border=\"1\">\n");
        echo("<tr align='center'><td>Nome</td><td>Latitude</td><td>Longitude</td><td>Apagar</td></tr>\n");
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
	    echo("<td><a href=\"removeLocal.php?nomeLocal={$row[0]}\">Apagar</a></td>\n");
            echo("<tr>\n");
        }
	//echo("<tr><td><a href=\"pageInsertLocal.php\">Novo</a></td><td></td><td></td><td></td></tr>");
       	echo("<tr><td colspan=4 align='center'><a href=\"pageInsertLocal.php\"> Novo Local </a></td></tr>");
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
