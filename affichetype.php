<html>
<head>
<meta http-equiv="content-type" content="text/html;">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="index.css">
<title>Cocktails</title>
</head>
<?php
  $Choix=$_POST["Choix"];
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
  if (isset($Choix))
  {
//Ici le resultat de la recherche
    //Connexion a la base de donnees
      //Connexion a la base de donnee
    $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
  //Requete SQL
    $SQLS="SELECT Id_Recette,Nom_Recette FROM t_recette WHERE Type_R=$Choix";
	$sqls2="SELECT count(*) as nbre FROM t_recette WHERE Type_R=$Choix";
    echo "<H2><span id=titrepage>Recettes correspondant au crit&egrave;re recherch&eacute; :</span></H2>\n";
    echo "<FORM NAME=\"Affiche_rec\" METHOD=\"POST\" ACTION=\"afficherecette.php\">\n";
	foreach($connecter->query($sqls2) as $row)
	{
		$nb=$row["nbre"];
	}
//Si il y a une réponse
    if ($nb!=0)
    {
      echo "<table border=\"$CadreChoixEpaisseur\" width=\"60%\" id=fondchoix>\n<tr>\n<td valign=\"middle\">\n";
      foreach($connecter->query($SQLS) as $row)
      {
        echo "<p><INPUT TYPE=\"radio\" NAME=\"Choix\" VALUE=\"".$row["Id_Recette"]."\">".$row["Nom_Recette"]." &nbsp;<img src=\"images/$Puce2\"></p>\n";
      }
      echo "<p><INPUT TYPE=\"submit\" VALUE=\"Afficher\"></p>\n";
      echo "<p>&nbsp;</p>\n</td>\n</tr>\n</table>\n";
    }
    else
    {
      echo "<p>Il n'y a pas de cocktail correspondant au critère demandé</p>\n";
    }  
    echo "</FORM>\n";
  }
  else
  {
    echo "<p>Vous n'avez pas choisi de type de cocktail.</p>\n";
  }
//Fin de la recherche
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"find.php\">Retour</a></p>\n";
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"index.php\">Index</a></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>