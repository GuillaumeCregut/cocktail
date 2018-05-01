<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
</head>
<?php
  include"../config/config.inc.php";
//Definition des variables d'entrée
  $Choix=$_POST["Choix"];
  if (isset( $_POST["LeIng"])) 
  {
    $LeIng=$_POST["LeIng"]; //Cle primaire
  }
  $NouvNom=$_POST["NouvNom"];
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
  echo "<H2 align=\"center\"><span id=titrepage>Résultat de la commande</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
//On vérifie l'action a effectuer
  switch($Choix)
  {
    case 1 : 
             $LActionGood="L'ajout à bien été effectué"; //On ajoute
             $LActionBad="Ajout non effectué, consulter l'administrateur";
             $SQLS="INSERT INTO t_ingredients (Nom_Ingredient) VALUES(\"$NouvNom\")";
             break;
    case 2 :
             $LActionGood="La suppression à bien été effectuée"; //On supprime
             $LActionBad="Suppression non effectuée, consulter l'administrateur";
             $SQLS="DELETE FROM t_Ingredients WHERE id_Ingredient=$LeIng";
             break;
    case 3 :
             $LActionGood="La modification à bien été effectuée"; //On modifie
             $LActionBad="Modification non effectuée, consulter l'administrateur";
             $SQLS="UPDATE t_ingredients SET Nom_Ingredient=\"$NouvNom\" WHERE id_Ingredient=$LeIng";
             break;
  }
//On agit sur la base de donnees
 $connecter->query($SQLS);
//Fin de la page
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"gest_ing.php\">Retour</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"index.php\">Index de gestion</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"../index.php\">Index</a></p>\n";
  echo "</td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "../footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>