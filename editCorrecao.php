<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $mail = $_REQUEST['mail'];
    $numero = $_REQUEST['num'];
    $a_id = $_REQUEST['a_id'];

    $origMail = $_REQUEST['origMail'];
    $origNro = $_REQUEST['origNro'];
    $origa_id = $_REQUEST['origa_id'];

	echo($mail);echo($numero);echo($a_id);echo($origMail);echo($origNro);echo($origa_id);

    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE correcao SET email = :mail, nro = :nro, anomalia_id = :id  WHERE (email = :omail) AND (nro = :onro) AND (anomalia_id = :oa_id);";
	
        $result = $db->prepare($sql);
        $result->execute([':mail' => $mail, ':nro' => $numero, ':a_id' => $a_id, ':omail' => $origMail, ':onro' => $origNro, ':oa_id' => $origa_id]);

        echo("<p>Editado com sucesso</p>");

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
