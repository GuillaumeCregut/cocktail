<html>
<head>
<meta http-equiv="content-type" content="text/html;">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
<script language="JavaScript">
<!--
function na_open_window(name, url, left, top, width, height, toolbar, menubar, statusbar, scrollbar, resizable)
{
  toolbar_str = toolbar ? 'yes' : 'no';
  menubar_str = menubar ? 'yes' : 'no';
  statusbar_str = statusbar ? 'yes' : 'no';
  scrollbar_str = scrollbar ? 'yes' : 'no';
  resizable_str = resizable ? 'yes' : 'no';
  window.open(url, name, 'left='+left+',top='+top+',width='+width+',height='+height+',toolbar='+toolbar_str+',menubar='+menubar_str+',status='+statusbar_str+',scrollbars='+scrollbar_str+',resizable='+resizable_str);
}
// -->
</script>
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
  echo "<H2 align=\"center\"><span id=titrepage>Ajouter une recette</span></H2>\n";
  $LeWidth=$ImageWidth+50;
  echo "<p><font color=\"red\"><u><b>Pensez &agrave; regarder si la recette n'existe pas.</b></u></font> <input type=\"button\" value=\"Rechercher\" onclick=\"na_open_window('win1', 'rech_rec.php', 100, 100, $LeWidth, 500, 1, 1, 1, 1, 1);\"></p>\n";
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
    //Affiche les recettes existantes
  echo "<p><span id=titre>Liste des recettes existantes</span></p>\n";
  echo "<TABLE BORDER=\"$CadreChoixEpaisseur\" id=fondchoix>\n\n";
  echo "<TR><TD>\n";
  $SQLS="SELECT Nom_Recette FROM t_recette ORDER BY Nom_Recette ASC";
  foreach($connecter->query($SQLS) as $row)
  {
    echo "<p>* ".$row["Nom_Recette"]." <img src=\"../images/$Puce2\"></p>";
  }
  echo "</TD></TR></TABLE>\n";
//Debut du formulaire
  echo "<FORM NAME=\"Ajout_format\" METHOD=\"POST\" ACTION=\"do_add_rec.php\">\n";
  //Entrer le nom de la recette
  echo "<p><span id=demandevaleur>Nom de la recette</span> : <INPUT TYPE=\"text\" NAME=\"Nom_recette\"></p>\n";
  //Recupere les types de recettes
  echo "<p><span id=demandevaleur>Type de cocktail</span> : <SELECT NAME=\"Le_Type\">\n";
  $SQLS="SELECT Id_Type, Nom_T FROM t_type ORDER BY Nom_T"; //Selection du type
  foreach($connecter->query($SQLS) as $row)
  {
    echo "<OPTION VALUE=\"".$row["Id_Type"]."\">".$row["Nom_T"]."</OPTION>\n";
  }
  echo "</SELECT>\n</p>\n";
 //recupere les ingredients
  echo "<p><span id=demandevaleur>Liste des ingr&eacute;dients</span> :<br>";
  $SQLS="SELECT Nom_Ingredient, Id_Ingredient FROM t_ingredients ORDER BY Nom_Ingredient ASC";
  echo "<TABLE BORDER=\"$CadreChoixEpaisseur\" id=fondchoix><TR><TD>\n";
  foreach($connecter->query($SQLS) as $row)
  {
    echo '<p><INPUT TYPE="checkbox" NAME="ingredient[]" VALUE="'.$row["Id_Ingredient"].'">'.$row["Nom_Ingredient"].'</p>';
  }
  echo "</TD></TR></TABLE></p>\n";
  //affiche la préparation
  echo "<p>Pr&eacute;paration : <br>\n";
  echo "<TEXTAREA NAME=\"preparation\" ROWS=\"10\" COLS=\"50\"></TEXTAREA>\n</p>\n";
  echo"<p align=\"center\"><INPUT TYPE=\"submit\" VALUE=\"Valider\"></p>\n";
  echo"</FORM>";
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