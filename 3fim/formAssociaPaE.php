<html>
<link rel="stylesheet" href="styles.css">
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

        $sql = "SELECT numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro FROM EventoEmergencia
        WHERE numProcessoSocorro is null;";
        $result = $db->prepare($sql);
        $result->execute();

        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<table border=\"1\">\n");
        echo("<tr><td>numTelefone</td><td>instanteChamada</td><td>nomePessoa</td><td>moradaLocal</td><td>numProcessoSocorro</td></tr>\n");
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
            echo("</td><td>");
            echo($row[4]);
            echo("</td><td>");
            echo("<a href=\"formAssociaPaE2.php?numTelefone={$row[0]}&instanteChamada={$row[1]}\">associar processo de socorro ao evento</a></td>\n");
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
