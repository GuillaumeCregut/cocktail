<html>
<head>
<meta http-equiv="content-type" content="text/html;">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
</head>
<?php
  include"../config/config.inc.php";
//Definition des variables d'entrée
  $Choix=$_POST["Choix"];
  if (isset( $_POST["LeType"]))
  {
    $LeType=$_POST["LeType"]; //Cle primaire
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
  echo "<H2 align=\"center\"><span id=titrepage>R&eacute;sultat de la commande</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
//On vérifie l'action a effectuer
  switch($Choix)
  {
    case 1 : 
             $LActionGood="L'ajout a bien été effectué"; //On ajoute
             $LActionBad="Ajout non effectué, consulter l'administrateur";
             $SQLS="INSERT INTO t_type (Nom_T) VALUES(\"$NouvNom\")";
             break;
    case 2 :
             $LActionGood="La suppression a bien été effectuée"; //On supprime
             $LActionBad="Suppression non effectuée, consulter l'administrateur";
             $SQLS="DELETE FROM t_type WHERE id_Type=$LeType";
             break;
    case 3 :
             $LActionGood="La modification a bien été effectuée"; //On modifie
             $LActionBad="Modification non effectuée, consulter l'administrateur";
             $SQLS="UPDATE t_type SET Nom_T=\"$NouvNom\" WHERE id_Type=$LeType";
             break;
  }
//On agit sur la base de donnees
 $connecter->query($SQLS);
//Fin de la page
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"gest_type.php\">Retour</a></p>\n";
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