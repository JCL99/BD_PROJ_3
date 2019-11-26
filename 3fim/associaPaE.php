<html>
<head><link rel="stylesheet" href="styles.css"></head>

    <body>
<?php
    $numTelefone = $_REQUEST['numTelefone'];
    $instanteChamada = $_REQUEST['instanteChamada'];
    $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE  EventoEmergencia SET numProcessoSocorro = :numProcessoSocorro WHERE numTelefone = :numTelefone and instanteChamada = :instanteChamada;";

        $result = $db->prepare($sql);
        $result->execute([':numProcessoSocorro' => $numProcessoSocorro, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);

        echo("<p>Inserido com sucesso</p>");

        $db = null;
        header("Location: /ist187679/formAssociaPaE.php");
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
