<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $nomeEntidade = $_REQUEST['nomeEntidade'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO EntidadeMeio values (:nomeEntidade);";

        $result = $db->prepare($sql);
        $result->execute([':nomeEntidade' => $nomeEntidade]);

        echo("<p>Inserido com sucesso</p>");

        $db = null;

        header("Location: /ist187679/formEntidade.php");
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
