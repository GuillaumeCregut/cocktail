<html>
<head>
<meta http-equiv="content-type" content="text/html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="index.css">
<title>Cocktails</title>
</head>
<?php
   $Choix=utf8_decode($_POST["Choix"]);
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
//Ici le resultat de la recherche
  //Connexion a la BDD
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata);
  //Requete SQL 
  //On recupere le nom de la recette le type et la preparation de la recette dans des variables.
  $SQLS="SELECT TT.Nom_T, TR.Nom_Recette,TR.Preparation FROM t_recette TR INNER JOIN t_type TT ON TR.Type_R=TT.Id_Type WHERE TR.Id_Recette=\"$Choix\"";
  
//On affiche la tete de présentation avec le nom et le type de la recette (couleur ?).
  foreach($connecter->query($SQLS) as $row)
  {
    $LeNomRecette=$row["Nom_Recette"];
    $LeTypeRecette=$row["Nom_T"];
    $LaPreparation=nl2br($row["Preparation"]);
  }
  echo "<H2><span id=titrepage>Cocktail</span> : <span id=nomrecette>$LeNomRecette</span></H2>\n";
  echo "<p>Ce cocktail est <span id=typerecette>$LeTypeRecette</span>.</p>\n";
  echo "<p><span id=titre>Liste des ingr&eacute;dients</span> :</p>\n";
//On recupere ensuite la liste des ingrédients concernant cette recette.
  $SQLS="SELECT TI.Nom_Ingredient FROM t_liens TL INNER JOIN t_ingredients TI ON TL.Id_R_Ingredient = TI.Id_Ingredient WHERE TL.Id_R_Recette =\"$Choix\"";
//On affiche les ingredients un par un.
  echo "<table border=\"$CadreChoixEpaisseur\" width=\"60%\" id=fonding>\n<tr>\n<td>";
  foreach($connecter->query($SQLS) as $row)
  {
    echo "<p>- ".$row["Nom_Ingredient"]."</p>\n";
  }
  echo "</td>\n</tr>\n</table>\n";
//On affiche ensuite la préparation.
  echo "<p><span id=titre>Pr&eacute;paration</span> : </p>";
  echo "<table border=\"$CadreChoixEpaisseur\" width=\"60%\" id=fonding>\n<tr>\n<td>";
  echo "<p>$LaPreparation</p>";
  echo "</td>\n</tr>\n</table>\n";
//Fin du resultat de la recherche
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"find.php\">Retour</a></p>\n";
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"index.php\">Index</a></p>\n";
  echo " </td>\n";
  echo "</tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>