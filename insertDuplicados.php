<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $oid = $_REQUEST['oid'];
    $did = $_REQUEST['did'];

    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO duplicado(item1, item2) values (:oid, :did);";
        $result = $db->prepare($sql);
        $result->execute([':oid' => $oid, ':did' => $did]);
        echo("<p>Inserido com sucesso</p>");

        $db = null;

        header("Location: /ist190732/BD_PROJ_3/home.php");
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
