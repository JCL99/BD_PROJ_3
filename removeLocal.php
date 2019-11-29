<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $nomeLocal = $_REQUEST['nomeLocal'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM local_publico WHERE nome = :nomeLocal;";

        $result = $db->prepare($sql);
        $result->execute([':nomeLocal' => $nomeLocal]);

        echo("<p>Removido com sucesso</p>");

        $db = null;

        header("Location: /ist190732/BD_PROJ_3/gerirLocais.php");
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
