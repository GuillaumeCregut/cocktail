<html>
<head>
<meta http-equiv="content-type" content="text/html;">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
</head>
<?php
//Fonctions de la page
function Create_Id($Futur)
{
//Mise en forme de la clé recette
  $Futur=Trim($Futur);
//tronquer le nom de la recette a 7 caractere et supprimer les espaces, ensuite concatener avec un nombre de 3 caractere max
  $TempId=subStr($Futur,0,7);
  $TempId=strtr($TempId," ","_");//On supprime les espaces
  srand((float)microtime()*1000000);
  $TempRand=rand(0,999);
  $ID1=$TempId.$TempRand;
  return $ID1;
}
//Fichier include
  include"../config/config.inc.php";
//Donnees entree
  $NomAjout=$_POST['Nom_recette'];
  $nbreIng=$_POST['ingredient'];
  $TypeRec=$_POST['Le_Type'];
  $LaPreparation=utf8_decode($_POST['preparation']);
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
  echo "<H2 align=\"center\"><span id=titrepage>Ajout d'un cocktail</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
  if ($NomAjout!="")//Si le nom n'est pas nul
  {
    //Ajout de la recette dans le table recette
    $LeID=Create_Id($NomAjout);
    $SQLS="INSERT INTO t_recette (Nom_Recette,Id_Recette,Type_R,Preparation) VALUES(\"$NomAjout\",\"$LeID\",\"$TypeRec\",\"$LaPreparation\")";
    $connecter->exec($SQLS);
    //
    $Compteur=0;//Pour chaque ingredient, on l'ajoute dans la base.
    foreach($nbreIng as $LeIngredient)
    {
       $SQLS="INSERT INTO t_liens(Id_R_Ingredient,Id_R_Recette) VALUES($LeIngredient,\"$LeID\")";
       $connecter->exec($SQLS);
    }
  }
  else
  {
    echo "<p>Veuillez remplir correctement le formulaire.</p>";
  }
//Fin de la page
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"ajout_rec.php\">Retour</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"index.php\">Retour Index gestion</a></p>\n";
  echo "<p align=\"left\"><img src=\"../images/$Puce1\" border=\"0\"><a href=\"../index.php\">Index</a></p>\n";
  echo "</td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "../footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>