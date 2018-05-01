<HTML>
<HEAD>
<TITLE>Ajouter une fichier image</TITLE>
</HEAD>
<BODY>
<?php
  include "../config/config.inc.php";
  include "../config/function.inc.php";
//Récupération du fichier image d'entete
  $TypeFichier=$_FILES['userfile']['type'];
  $NomTemp=$_FILES['userfile']['name'];
  $TailleFichier=$_FILES['userfile']['size'];
  $Erreur=$_FILES['userfile']['error'];
  $CestOK=IsFileOk($NomTemp,$TailleFichier,$TypeFichier,$Erreur);
  $NewFileHead=""; //Si la valeur reste a nulle il ne faut pas la changer.
  if ($CestOK)
  {
     $NomFichier=basename($_FILES['userfile']['name']);
     $uploadfile = $uploaddir . basename($_FILES['userfile']['name']); //--->A changer
     if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
     {                //-->Ici faire traitement
        echo "<p>Fichier copié avec succès, veuillez recopier l'adresse ci dessous sans les guillemet dans la page de configuration<br>\n";
        echo "Fichier : \"$NomFichier\"</p>\n";
        echo "<p>Image choisie :<img src=\"$uploadfile\"></p>\n";
     }
     else
     {             // -->Ici faire traitement
        echo "<p>Pour des raisons de sécurité, le fichier n'a pas été copié.</p>\n";
     }
  }
  else
  {
    echo "<p>Le fichier n'est pas compatible ou il n'y a pas de fichier.</p>\n";
  }
  echo "<p><a href=\"javascript:window.close();\">Fermer cette page</a></p>\n";
//Fin récupération du fichier image
?>
</BODY>
</HTML>