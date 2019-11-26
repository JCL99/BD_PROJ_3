<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;


        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT numMeio, nomeEntidade FROM MeioSocorro;";
        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<h1>Meios Socorro<h1>");
        echo("<table border=\"1\">\n");
        echo("<tr><td>numMeio</td><td>nomeEntidade</td><td><a href=\"insertFormMeiosSocorro.php\">Novo</a></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row[0]);
            echo("</td><td>");
            echo($row[1]);
            echo("</td><td>");
            echo("<a href=\"removeMeiosSocorro.php?numMeio={$row[0]}&nomeEntidade={$row[1]}\">Apagar</a>\n");
            echo("</td><td>");
            echo("<a href=\"editFormMeios.php?numMeio={$row[0]}&nomeEntidade={$row[1]}\">Editar</a></td>\n");
            echo("<tr>");
        }
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
