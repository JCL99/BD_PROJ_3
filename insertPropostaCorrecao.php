<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $mail = $_REQUEST['mail'];
    $numero = $_REQUEST['numero'];
    $dataHora = $_REQUEST['dataHora'];
    $texto = $_REQUEST['texto'];
	echo($mail);
	echo($numero);
	echo($dataHora);
    echo($texto);
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist190732";
        $password = "12345678";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO proposta_de_correcao(email, nro, data_hora,texto) values (:mail, :numero, :dataHora, :texto);";
        $result = $db->prepare($sql);
        $result->execute([':mail' => $mail, ':numero' => $numero, ':dataHora'=> $dataHora, ':texto'=> $texto]);
        echo("<p>Inserido com sucesso</p>");

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
