<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $mail = $_REQUEST['mail'];
    $numero = $_REQUEST['numero'];
    $id_anomalia = $_REQUEST['id_anomalia'];
	echo($mail);
	echo($numero);
	echo($id_anomalia);
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO correcao(email, nro, anomalia_id) values (:mail, :numero, :id_anomalia);";
        $result = $db->prepare($sql);
        $result->execute([':mail' => $mail, ':numero' => $numero, ':id_anomalia'=> $id_anomalia]);
        echo("<p>Inserido com sucesso</p>");

        $db = null;

        header("Location: /ist190732/BD_PROJ_3/gerirCorrecoes.php");
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
