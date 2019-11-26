<html>
<link rel="stylesheet" href="styles.css">
 <body>
   <h3>Associar Evento de Emergencia a processo</h3>
   <form action="associaPaE.php" method="post">
   <p><input type="hidden" name="numTelefone" value="<?=$_REQUEST['numTelefone']?>"/></p>
   <p><input type="hidden" name="instanteChamada" value="<?=$_REQUEST['instanteChamada']?>"/></p>
   <p>Numero do Processo de Socorro: <input type="text" name="numProcessoSocorro"/></p>
   <p><input type="submit" value="Submit"/></p>
   </form>
 </body>
</html>
