<html>
<head><link rel="stylesheet" href="styles.css"></head>
 <body>
   <h3>Associar Meio <?=$_REQUEST['numMeio']?> <?=$_REQUEST['nomeEntidade']?> a processo</h3>
   <form action="associaMeioProcesso.php" method="post">
   <p><input type="hidden" name="numMeio" value="<?=$_REQUEST['numMeio']?>"/></p>
   <p><input type="hidden" name="nomeEntidade" value="<?=$_REQUEST['nomeEntidade']?>"/></p>
   <p>Numero do Processo de Socorro: <input type="text" name="numProcessoSocorro"/></p>
   <p><input type="submit" value="Submit"/></p>
   </form>
 </body>
</html>
