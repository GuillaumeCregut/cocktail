<html>
<head>
<meta http-equiv="content-type" content="text/html;">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
</head>
<?php
  include"../config/config.inc.php";
//Affichage
  echo "<body text=\"black\" link=\"blue\" vlink=\"purple\" alink=\"red\">\n";
  echo "<div align=\"center\">\n";
  echo "<table border=\"0\"  width=\"$ImageWidth\">\n";
  echo "  <tr>\n";
  echo "      <td height=\"$ImageHeight\" background=\"../images/$ImageFond\">\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td valign=\"top\">\n";
  echo "          <h1 align=\"center\">Les Cocktails de : <span id=proprio>$NomClient</span></h1>\n";
  //Ici interieur de la page
  echo "<H2 align=\"center\"><span id=titrepage>Gestion des recettes</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
 $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"ajout_rec.php\">Ajouter une recette de coktail.</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"sup_rec.php\">Supprimer une recette de cocktail.</a></p>\n";
  echo "<p>Pour des raisons pratiques, il n'y a pas de possibilit&eacute; de modifier une recette. Voir l'aide.</p>\n";
//Fin de la page
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"index.php\">Retour</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"../index.php\">Index</a></p>\n";
  echo "</td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "../footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>