<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
<?php
    $numTelefone = $_REQUEST['numTelefone'];
    $instanteChamada = $_REQUEST['instanteChamada'];
    $nomePessoa = $_REQUEST['nomePessoa'];
    $moradaLocal = $_REQUEST['moradaLocal'];
    if($_REQUEST['numProcessoSocorro'] == '') {
        $numProcessoSocorro = NULL;
    } else {
        $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
    }
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist187679";
        $password = "ola123456";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO EventoEmergencia values (:numTelefone, :instanteChamada, :nomePessoa, :moradaLocal, :numProcessoSocorro);";

        $result = $db->prepare($sql);
        $result->execute([':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada, ':nomePessoa' => $nomePessoa, ':moradaLocal' => $moradaLocal, ':numProcessoSocorro' => $numProcessoSocorro ]);


        $db = null;

        header("Location: /ist187679/formEventoEmergencia.php");
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
