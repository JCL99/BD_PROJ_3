<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $nome = $_REQUEST['nomeLocal'];
    $latitude = $_REQUEST['lat'];
    $longitude = $_REQUEST['long'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO local_publico(latitude, longitude, nome) values (:lat, :long, :nome);";
        $result = $db->prepare($sql);
        $result->execute([':nome' => $nome, ':lat' => $latitude, ':long'=> $longitude]);
        echo("<p>Inserido com sucesso</p>");

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
