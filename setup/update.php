<html>
<head>
<title>Configuration du logiciel des cocktails</title>
</HEAD>
<BODY>
<link rel="stylesheet" type="text/css" href="config.css">
<?php
//fichier include
  include "../config/system.inc.php";
  include "../config/function.inc.php";
//Variables du fichier config.inc.php
  $LHote=$_POST["HostName"];
  $LeUser=$_POST["UserName"];
  $LePass=$_POST["UserPass"];
  $LaBase=$_POST["DataBase"];
  $LeFond=$_POST["FondImage"];
  $LeNom=$_POST["AfficheNom"];
  $LaPuce1=$_POST["Puce1"];
  $LaPuce2=$_POST["Puce2"];
  $LaCouleurCadre=$_POST["CouleurCadre"];
  $LepaisseurCadre=$_POST["WeigthCadre"];
//Fin des variable config.inc.php
//Variable pour la feuille CSS

//Fin des variables pour la feuille CSS
//Récupérationo des dimensions du fichier fond.
  $CheminImage=$uploaddir.$LeFond;
  list($LaLargeur, $LaHauteur) = getimagesize($CheminImage);
//Création du fichier de config
  echo "<p><u>Création du fichier de configuration</u></p>";
  $fichier=fopen("../config/config.inc.php","w");
  fputs($fichier,"<?php\n");
//
  fputs($fichier,"\$host=\"$LHote\";  //Connexion a la base de donnée\n");
  fputs($fichier,"\$userdata=\"$LeUser\"; //Nom de l'utilisateur\n");
  fputs($fichier,"\$passdata=\"$LePass\"; //Mot de passe\n");
  fputs($fichier,"\$basecocktail=\"$LaBase\";  //Nom de la base\n");
  fputs($fichier,"\$ImageWidth=$LaLargeur;  //Taille de l'image d'en tete en largeur\n");
  fputs($fichier,"\$ImageFond=\"$LeFond\";  //Nom de l'image\n");
  fputs($fichier,"\$ImageHeight=$LaHauteur;  //Taille de l'image d'en tete en hauteur\n");
  fputs($fichier,"\$NomClient=\"$LeNom\";  //Personnalisation de la page\n");
  fputs($fichier,"\$Puce1=\"$LaPuce1\";  //Puce de liste\n");
  fputs($fichier,"\$CadreChoix=\"$LaCouleurCadre\";  //Couleur de fond des cadres de choix\n");
  fputs($fichier,"\$CadreChoixEpaisseur=$LepaisseurCadre;  // Bordure des cadre de choix\n");
  fputs($fichier,"\$Puce2=\"$LaPuce2\";  //Puce liste résultat\n");
//
  fputs($fichier,"?>");
  $OK=fclose($fichier);
  if ($OK)
  {
    echo "<p>-Création du fichier de configuration créé avec succés.</p>";
  }
  else
    echo "<p>-Création du fichier de configuration impossible.</p>";
//Creation du fichhier CSS


//Pied de page
  echo "<p><a href=\"../index.php\">Reour à l'index</a></p>\n";
  include "../footer.php";
?>
</BODY>
</HTML>