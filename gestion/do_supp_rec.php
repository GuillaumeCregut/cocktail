<html>
<head>
<meta http-equiv="content-type" content="text/html">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
</head>
<?php
  include"../config/config.inc.php";
//Variable d'entree
  $LaCle=$_POST["LaRec"];  
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
  echo "<H2 align=\"center\"><span id=titrepage>Suppression d'une recette</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
  
// Affichage des action possibles
  //On supprime d'abord ce qui a trait avec les liens.
  $SQLS="DELETE FROM t_liens WHERE Id_R_Recette=\"$LaCle\"";
  $NbreLigne=$connecter->exec($SQLS);
  
//Affiche le nombre de liens supprimé
  echo "<p><span id=resultbdd>$NbreLigne ingr&eacute;dient(s) li&eacute;(s) ont &eacute;t&eacute; supprim&eacute;(s)</span></p>\n";
//Supprime dans la table recette
  $SQLS="DELETE FROM t_recette WHERE Id_Recette=\"$LaCle\"";
  $NbreLigne=$connecter->exec($SQLS);
  echo "<p><span id=resultbdd>Recette effac&eacute;e avec succ&egrave;s.</span></p>\n";
//Fin de la page
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"sup_rec.php\">Retour</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"index.php\">Gestion des recettes</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"../index.php\">Index</a></p>\n";
  echo "</td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "../footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>