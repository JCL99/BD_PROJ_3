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

        $sql = "SELECT numMeio, nomeMeio, nomeEntidade FROM Meio
        where not exists (select numMeio, nomeEntidade FROM MeioApoio where Meio.numMeio = MeioApoio.numMeio and Meio.nomeEntidade = MeioApoio.nomeEntidade);";
        $result = $db->prepare($sql);
        $result->execute();

        
        echo("<h1> Meios <h1>");
        echo("<table border=\"1\">\n");
        echo("<tr><td>numMeio</td><td>nomeMeio</td><td>nomeEntidade</td><td><a href=\"insertFormMeio.php\">Novo</a></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row[0]);
            echo("</td><td>");
            echo($row[1]);
            echo("</td><td>");
            echo($row[2]);
            echo("</td><td>");
            echo("<a href=\"insertMeiosApoio.php?numMeio={$row[0]}&nomeEntidade={$row[2]}\">Adicionar a Meios de Apoio</a>\n");
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
