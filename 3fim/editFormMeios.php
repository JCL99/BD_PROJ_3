<html>
<head><link rel="stylesheet" href="styles.css"></head>
    <body>
        <h3>Edita Meio</h3>
        <form action="editMeios.php" method="post">
            <p><input type="hidden" name="numMeio" value="<?=$_REQUEST['numMeio']?>"/></p>
            <p><input type="hidden" name="nomeEntidade" value="<?=$_REQUEST['nomeEntidade']?>"/></p>
            <p>nome meio: <input type="text" name="nomeMeio"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
     <body>
  <html>
