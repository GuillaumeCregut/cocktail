<HTML>
<HEAD>
<TITLE>Envoi de la photo d'entete</TITLE>
</HEAD>
<BODY>
<H1>Choix de la photo d'en tete.</H1>
<form enctype="multipart/form-data" action="download.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="250000" >
<p><font color="red"><u><b>Attention</b></u></font> : Seuls les fichiers jpeg (*.jpg) et gif (*.gif) sont acceptés.<br>
Le poids maximum de l'image ne doit pas dépasser 250Ko.</p>
<p>Envoyez cette image : <input name="userfile" type="file"> </p>
<p><input type="submit" value="Envoyer le fichier"></p>
</form>
</BODY>
</HTML>