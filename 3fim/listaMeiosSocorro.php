<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
  $moradaLocal = $_REQUEST['moradaLocal'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;


        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT numMeio, nomeEntidade FROM acciona natural join MeioSocorro natural join EventoEmergencia
        WHERE moradaLocal = :moradaLocal;";
        $result = $db->prepare($sql);
        $result->execute([':moradaLocal' => $moradaLocal]);

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<table border=\"1\">\n");
        echo("<tr><td>numMeio</td><td>nomeEntidade</td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row[0]);
            echo("</td><td>");
            echo($row[1]);
            echo("</td></tr>\n");
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
