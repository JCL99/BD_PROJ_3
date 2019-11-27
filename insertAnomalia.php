<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $id = $_REQUEST['id'];
    $zona = $_REQUEST['zona'];
    $imagem = $_REQUEST['imagem'];
    $lingua = $_REQUEST['lingua'];
    $timestamp = $_REQUEST['timestamp'];
    $descricao = $_REQUEST['descricao'];
    $anomaliaRedacao = $_REQUEST['anomaliaRedacao'];

    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO anomalia VALUES(:id, :zona, :img, :ling, :ts, :desc, :a_red);";
        $result = $db->prepare($sql);
        $result->execute([':id' => $id, ':zona' => $zona, ':img'=> $imagem, ':ling' => $lingua, ':ts' => $timestamp, ':desc' => $descricao, ':a_red' => $anomaliaRedacao]);
        echo("<p>Inserido com sucesso</p>");

        $db = null;

        header("Location: /ist190732/BD_PROJ_3/gerirAnomalias.php");
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
