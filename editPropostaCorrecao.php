<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>

<?php

    $mail = $_REQUEST['origMail'];
    $numero = $_REQUEST['origNro'];
    $dataHora = $_REQUEST['dataHora'];
    $texto = $_REQUEST['texto'];

    echo($mail);

    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE proposta_de_correcao SET data_hora = :dataHora, texto = :texto  WHERE (email = :mail) AND (nro = :numero);";
        echo($sql);
	
        $result = $db->prepare($sql);
        $result->execute([':mail' => $mail, ':numero' => $numero, ':dataHora' => $dataHora, ':texto' => $texto]);

        echo("<p>Editado com sucesso</p>");

        $db = null;

        header("Location: /ist190732/BD_PROJ_3/gerirPropostasDeCorrecao.php");
        exit;
    }
    catch (PDOException $e)
    {
        echo("<p><a href=\"home.php\">< Home</a></p>");
        echo("<p>ERROR: Nao foi possivel efetuar a operacao.</p>");
        echo("<p>ERROR: {$e->getMessage()}</p>");

    }
?>
    </body>
</html>
