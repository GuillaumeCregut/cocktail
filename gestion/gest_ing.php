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
  echo "<H2 align=\"center\"><span id=titrepage>Gestion des ingr&eacute;dients des cocktails</span></H2>\n";
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
  echo "<p><u>A faire :</u></p>\n";
  echo "<form name=\"form1\" method=\"post\" action=\"do_ing.php\">\n";
  echo "<table border=\"$CadreChoixEpaisseur\" id=fondchoix>\n";
  echo "<tr><td>\n";
  echo "<p><input type=\"radio\" name=\"Choix\" value=\"1\" checked> Ajouter</p>\n";
  echo "<p><input type=\"radio\" name=\"Choix\" value=\"2\" onclick=\"alert('Attention, toute suppression est d&eacute;finitive');\"> Supprimer</p>\n";
  echo "<p><input type=\"radio\" name=\"Choix\" value=\"3\"> Modifier</p>\n";
  echo "</td></tr>\n";
  echo "</TABLE>\n";
  $LeWidth=$ImageWidth+50;
  echo "<font color=\"red\"><u><b>Pensez &grave; regarder si l'ingr&eacute;dient n'existe pas.</b></u></font> <input type=\"button\" value=\"Rechercher\" onclick=\"na_open_window('win1', 'rech_ing.php', 100, 100, $LeWidth, 500, 1, 1, 1, 1, 1);\"></p>\n";
  echo "<p><u>Liste :</u></p>\n";
  echo "<table border=\"1\" id=fondchoix>\n";
  echo "    <tr>\n";
  echo "        <td>\n";
  echo "            <p>&nbsp;</p>\n";
  echo "        </td>\n";
  echo "        <td>\n";
  echo "            <p>Ingredients</p>\n";
  echo "        </td>\n";
  echo "   </tr>\n";
//sql
//Requete
  $SQLS="SELECT Id_Ingredient,Nom_Ingredient FROM t_Ingredients ORDER BY Nom_Ingredient";
//Exectution 
  foreach($connecter->query($SQLS) as $row)
  {
    echo "   <tr>\n";
    echo "        <td>\n";
    echo '<p><input type="radio" name="LeIng" value="'.$row["Id_Ingredient"].'"></p><br>';
    echo "</td>\n";
    echo '<td><p>'.$row["Nom_Ingredient"].'</p></td>';
    echo" </tr>\n";
  }
//Fin SQL
  echo "</table>\n";
  echo "<p>&nbsp;</p>\n";
  echo "<table border=\"$CadreChoixEpaisseur\" id=fondchoix>\n";
  echo "<tr><td>\n";
  echo "<p>&nbsp</p>\n<p><span id=demandevaleur>Nouveau</span> : <input type=\"text\" name=\"NouvNom\"></p>\n";
  echo "<div align=\"center\">\n";
  echo "<table border=\"0\">\n";
  echo "<tr>\n";
  echo "<td><input type=\"submit\" value=\"Executer\"></td>\n";
  echo "<td><input type=\"reset\" value=\"effacer\"></td>\n";
  echo "</tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  echo "<p>&nbsp;</p>\n</td></tr>\n";
  echo "</table>\n";
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
