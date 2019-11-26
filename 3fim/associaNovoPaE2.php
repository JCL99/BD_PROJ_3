<html>
<head></head>

    <body>
<?php
    $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
    $numTelefone = $_REQUEST['numTelefone'];
    $instanteChamada = $_REQUEST['instanteChamada'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        pg_query("start transaction");

        $sql = "INSERT INTO ProcessoSocorro values (:numProcessoSocorro);";

        $result1 = $db->prepare($sql);
        $result1->execute([':numProcessoSocorro' => $numProcessoSocorro]);

        $sql = "UPDATE  EventoEmergencia SET numProcessoSocorro = :numProcessoSocorro WHERE numTelefone = :numTelefone and instanteChamada = :instanteChamada;";

        $result2 = $db->prepare($sql);
        $result2->execute([':numProcessoSocorro' => $numProcessoSocorro, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);

        if ($result1 and $result2) {
          pg_query("commit");
        }
        else {
          pg_query("rollback");
        }

        $db = null;

        header("Location: /ist187679/formProcessoSocorro.php");
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
