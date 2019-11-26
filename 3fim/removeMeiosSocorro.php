<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $numMeio = $_REQUEST['numMeio'];
    $nomeEntidade = $_REQUEST['nomeEntidade'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM MeioSocorro WHERE numMeio = :numMeio and nomeEntidade = :nomeEntidade;";

        $result = $db->prepare($sql);
        $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

        echo("<p>Removido com sucesso</p>");

        $db = null;

       header("Location: /ist187679/formMeioSocorro.php");
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