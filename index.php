<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="index.css">
<title>Cocktails</title>
</head>
<?php
  include"config/config.inc.php";
//Affichage
  echo "<body text=\"black\" link=\"blue\" vlink=\"purple\" alink=\"red\">\n";
  echo "<div align=\"center\">\n";
  echo "<table border=\"0\"  width=\"$ImageWidth\">\n";
  echo "  <tr>\n";
  echo "      <td height=\"$ImageHeight\" background=\"images/$ImageFond\">\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td valign=\"top\">\n";
  echo "          <h1 align=\"center\">Les Cocktails de : <span id=proprio>$NomClient</span></h1>\n";
  echo "              <p align=\"left\"><img src=\"images/$Puce1\" border=\"0\"><a href=\"gestion/index.php\">G&eacute;rer la liste des cocktails.</a></p>\n";
  echo "              <p align=\"left\"><img src=\"images/$Puce1\" border=\"0\"><a href=\"find.php\">Rechercher une recette de cocktails.</a></p>\n";
  echo "              <p align=\"left\"><img src=\"images/$Puce1\" border=\"0\"><a href=\"setup/index.php\">Configurer l'application.</a></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>