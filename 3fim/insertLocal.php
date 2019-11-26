<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    ini_set('default_charset','UTF-8');
    if(isset($_REQUEST['moradaLocal'])){
    $moradaLocal = $_REQUEST['moradaLocal'];

    if(empty($moradaLocal)){
      echo("<p>Preencha todos os dados necessario<p>");
    }
    else{
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO Local values (:moradalocal);";

        $result = $db->prepare($sql);
        $result->execute([':moradalocal' => $moradaLocal]);

        echo("<p>Inserido com sucesso</p>");

        $db = null;

        header("Location: /ist187679/formLocal.php");
        exit;
    }
    catch (PDOException $e)
    {
        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<p>ERROR: Nao foi possivel efetuar a operacao.</p>");
    }
  }
  }
?>
    </body>
</html>
