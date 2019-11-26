<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM ProcessoSocorro WHERE numProcessoSocorro = :numProcessoSocorro;";

        $result = $db->prepare($sql);
        $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);

        echo("<p>Removido com sucesso</p>");

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
