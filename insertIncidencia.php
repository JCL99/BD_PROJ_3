<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $aid = $_REQUEST['aid'];
    $iid = $_REQUEST['iid'];
    $mail = $_REQUEST['mail'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO incidencia(anomalia_id, item_id, email) values (:aid, :iid, :mail);";
        $result = $db->prepare($sql);
        $result->execute([':aid' => $aid, ':iid' => $iid, ':mail'=> $mail]);
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
