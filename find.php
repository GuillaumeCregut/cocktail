<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Cocktails</title>
</head>
<?php
//Definistion des variables
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
  echo "<H2><span id=titrepage>Consultation des recettes de cocktail</span></H2>\n";
  echo "<table  border=\"$CadreChoixEpaisseur\" width=\"60%\" id=fondchoix>\n<tr>\n<td valign=\"middle\">\n";
  echo "              <p align=\"left\"><u>Choisissez le type de recherche</u> :</p>\n";
  echo "              <FORM NAME=\"Typerech\" METHOD=\"post\" ACTION=\"recherche.php\">\n";
  echo "<p>&nbsp;<SELECT NAME=\"typerecherche\">\n";
  echo "<OPTION VALUE=\"0\">Type de cocktail</OPTION>\n";
  echo "<OPTION VALUE=\"1\">Ingr&eacute;dient</OPTION>\n";
  echo "<OPTION VALUE=\"2\">Nom</OPTION>\n";
  echo "</SELECT>  </p>\n";
  echo "<p align=\"center\"><INPUT TYPE=\"submit\" VALUE=\"Rechercher\"></p>\n";
  echo "</FORM>\n";
  echo "</td>\n</tr>\n</table>\n";
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"index.php\">Index</a></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>