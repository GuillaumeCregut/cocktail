<html>
<head>
<meta http-equiv="content-type" content="text/html;">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
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
  echo "<H2 align=\"center\"><span id=titrepage>Gestion des types de cocktails</span></H2>\n";
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
// Affichage des action possibles
  echo "<p><u>A faire :</u></p>\n";
  echo "<form name=\"form1\" method=\"post\" action=\"do_type.php\">\n";
  echo "<table border=\"$CadreChoixEpaisseur\" id=fondchoix>\n";
  echo "<tr><td>\n";
  echo "<p><input type=\"radio\" name=\"Choix\" value=\"1\" checked> Ajouter</p>\n";
  echo "<p><input type=\"radio\" name=\"Choix\" value=\"2\" onclick=\"alert('Attention, toute suppression est d&eacute;finitive');\"> Supprimer</p>\n";
  echo "<p><input type=\"radio\" name=\"Choix\" value=\"3\"> Modifier</p>\n";
  echo "</td></tr>\n";
  echo "</TABLE>\n";
  echo "<p>&nbsp;</p>\n";
  echo "<p><u>Type :</u></p>\n";
  echo "<table border=\"1\" id=fondchoix>\n";
  echo "    <tr>\n";
  echo "        <td>\n";
  echo "            <p>&nbsp;</p>\n";
  echo "        </td>\n";
  echo "        <td>\n";
  echo "            <p>Type de cocktail</p>\n";
  echo "        </td>\n";
  echo "   </tr>\n";
//sql
//Requete
  $SQLS="SELECT Id_Type,Nom_T FROM t_type";
//Exectution 
  foreach($connecter->query($SQLS) as $row)
  {
    echo "   <tr>\n";
    echo "        <td>\n";
    echo "<p><input type=\"radio\" name=\"LeType\" value=\"".$row["Id_Type"]."\"></p>\n";
    echo "</td>\n";
    echo "<td><p>".$row["Nom_T"]."</p></td>\n";
    echo" </tr>\n";
  }
//Fin SQL
  echo "</table>\n";
  echo "<p>&nbsp;</p>\n";
  echo "<table border=\"$CadreChoixEpaisseur\" id=fondchoix>\n";
  echo "<tr><td>\n";
  echo "<p>&nbsp</p>\n<p><span id=demandevaleur>Nouveau type</span> : <input type=\"text\" name=\"NouvNom\"></p>\n";
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
