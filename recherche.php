<HTML>
<HEAD>
<meta charset="utf-8">
<TITLE>Consultation des recettes : </TITLE>
<link rel="stylesheet" type="text/css" href="index.css">
</HEAD>
<?php
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
///
  if (isset($_POST["typerecherche"]))
  
  $Item=$_POST["typerecherche"];
  else
	  $Item=0;
//Connexion a la base de donnees
      //Connexion a la base de donnee
  $OK=FALSE;
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
//
  switch($Item)
  {
    case 0 : {              //Par type
               $Lien="affichetype.php";
               $SQLS="SELECT Id_Type,Nom_T FROM t_type ORDER BY Nom_T";
               $Affiche="Recherche des cocktails par type";
               //$Id="$row->Id_Type";
			   $sqls2="select count(*) as nbre from t_type";
               $Code=0; //Ce n'est pas un cas compliqué
               break;
             }
    case 1 : {             //Par ingredient
               $Lien="afficheing.php";
               $SQLS="SELECT Id_Ingredient, Nom_Ingredient FROM t_ingredients ORDER BY Nom_Ingredient";
               $Affiche="Recherche des cocktails par ingr&eacute;dient";
			   $sqls2="select count(*) as nbre from t_ingredients";
               $Code=1; //C'est un cas compliqué
               break;
             }
    case 2 : {
               $Lien="afficherecette.php";  //Par nom
               $SQLS="SELECT Id_Recette,Nom_Recette FROM t_recette ORDER BY Nom_recette";
               $Affiche="Recherche  des cocktails par nom";
			   $sqls2="select count(*) as nbre from t_recette";
               $Code=0; //Ce n'est pas un cas compliqué
               break;
             }
  }
  echo "<H2><span id=titrepage>$Affiche</span></H2>\n";
  if ($Code==1)   //
  {
   //en attente selection mutliple	
	foreach($connecter->query($sqls2) as $row)
	{
		$nb=$row["nbre"];
	}
  
//Si il y a une réponse
    if ($nb!=0)
    {
      echo "<FORM NAME=\"selection\" ACTION=\"$Lien\" METHOD=\"POST\">\n";
      echo "<p><INPUT TYPE=\"radio\" NAME=\"TChoice\" VALUE=\"0\" checked>Contient un ingr&eacute;dient au moins <font color=\"red\"><b>OU</b></font> <INPUT TYPE=\"radio\" NAME=\"TChoice\" VALUE=\"1\">Contient tout ces ingr&eacute;dients</p>\n";
      echo "<table border=\"$CadreChoixEpaisseur\" width=\"60%\" id=fondchoix>\n<tr>\n<td valign=\"middle\">\n";
      echo "<p><u>Choix</u> : </p>\n";
      foreach($connecter->query($SQLS) as $row)
      {
        echo "<p><INPUT TYPE=\"checkbox\" NAME=\"ingredient[]\" VALUE=\"".$row["Id_Ingredient"]."\">".$row["Nom_Ingredient"]." &nbsp;<img src=\"images/$Puce2\"></p>\n";
      }
    }
  }
  else
  {
   foreach($connecter->query($sqls2) as $row)
	{
		$nb=$row["nbre"];
	}
//Si il y a une réponse
    if ($nb!=0)
    {
      echo "<FORM NAME=\"selection\" ACTION=\"$Lien\" METHOD=\"POST\">\n";
      echo "<table border=\"$CadreChoixEpaisseur\" width=\"60%\" id=fondchoix>\n<tr>\n<td valign=\"middle\">\n";
      echo "<p><u>Choix</u> :</p>\n";
      foreach($connecter->query($SQLS) as $row)
      {
        echo "<p><INPUT TYPE=\"radio\" NAME=\"Choix\" VALUE=\"$row[0]\">$row[1] &nbsp;<img src=\"images/$Puce2\"></p>\n";
      }
    }
  }
//Si il y a une réponse
  if ($nb!=0)
  {
    echo "<p>&nbsp;<INPUT TYPE=\"submit\" VALUE=\"Afficher\"></p>\n<p>&nbsp;</p>\n";
    echo "</td>\n</tr>\n</table>\n";
    echo "</FORM>\n";
  }
  else
  {
    echo "<p>Il n'y a pas de résultat correspondant a votre recherche</p>\n";
  }  
  echo "<p align=\"left\"><img src=\"images/$Puce1\" border=\"0\"><a href=\"find.php\">Retour</a></p>\n";
  echo "<p align=\"left\"><img src=\"images/$Puce1\" border=\"0\"><a href=\"index.php\">Index</a></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "footer.php";
  echo "</BODY>\n";
  echo "</HTML>\n";
?>