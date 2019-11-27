<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $id = $_REQUEST['id'];
    $descricao = $_REQUEST['descricao'];
    $localizacao = $_REQUEST['localizacao'];
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];

    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO item VALUES(:id, :desc, :loc, :lat, :long);";
        $result = $db->prepare($sql);
        $result->execute([':id' => $id, ':desc' => $descricao, ':loc'=> $localizacao, ':lat' => $latitude, ':long' => $longitude]);
        echo("<p>Inserido com sucesso</p>");

        $db = null;

        header("Location: /ist190732/gerirItems.php");
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
