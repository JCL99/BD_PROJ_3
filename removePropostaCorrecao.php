<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $mail = $_REQUEST['umail'];
    $numero = $_REQUEST['num'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM proposta_de_correcao WHERE (email = :mail) AND (nro = :nro);";

        $result = $db->prepare($sql);
        $result->execute([':mail' => $mail, ':nro' => $numero]);

        echo("<p>Removido com sucesso</p>");

        $db = null;

        header("Location: /ist190732/BD_PROJ_3/gerirPropostasDeCorrecao.php");
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
