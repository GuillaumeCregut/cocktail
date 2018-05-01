<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
<SCRIPT language="JavaScript">
<!--
function securit()
{
  NomRec=document.supprec.cacher.value;
  valide=confirm("etes-vous sur de supprimer la recette \""+NomRec+"\"");
  if (valide!=0)
  {
    document.forms.supprec.submit();
  }

}
function set_recette(id_recette)
{
	document.supprec.cacher.value=id_recette;
}
-->
</SCRIPT>

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
  echo "<H2 align=\"center\"><span id=titrepage>Supprimer une recette</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
    //Affiche les recettes existantes
  echo "<p><span id=titre>Liste des recettes existantes</span></p>\n";
  echo "<form name=\"supprec\" action=\"do_supp_rec.php\" method=\"post\">\n";
  echo "<input type=\"hidden\" name=\"cacher\" value=\"pasmoi\">\n";
  echo "<TABLE BORDER=\"$CadreChoixEpaisseur\" id=fondchoix>\n\n";
  echo "<TR><TD>\n";
  $SQLS="SELECT Id_Recette,Nom_Recette FROM t_recette ORDER BY Nom_Recette ASC";
  foreach($connecter->query($SQLS) as $row)
  {
    echo '<p><input type="radio" name="LaRec" value="'.$row["Id_Recette"].'" onclick="set_recette('.$row["Nom_Recette"].')"> '.$row["Nom_Recette"].' <img src="../images/'.$Puce2.'"></p>';
  }
  echo "</TD></TR></TABLE>\n";
  echo "<p><blink><font color=\"red\"><b><u>Attention ! Toute suppression est d&eacute;finitive.</u></b></font></blink></p>\n";
  echo "<p><input type=\"button\" Value=\"Supprimer\" onclick=\"securit()\"></p>\n";
  echo "</form>\n";
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