<HTML>
<HEAD>
<TITLE>Consultation des recettes : </TITLE>
<link rel="stylesheet" type="text/css" href="index.css">
</HEAD>
<html>
<head>
<meta http-equiv="content-type" content="text/html"; charset="utf-8">
<title>Cocktails</title>
</head>
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
//Début du code Affichage
  $LesIngredients=$_POST['ingredient'];
  $TheChoice=$_POST["TChoice"];
  $DEBUG_MODE =false;
  $Compte=count($LesIngredients);
  if ($Compte==0)
  {
    echo "<p>Vous n'avez pas choisi d'ingr&eacute;dients</p>";
  }
  else
  {
    if ($DEBUG_MODE)
    {
       echo "<p>Compte : $Compte</p>";
    }
    $Clause="(";
    foreach($LesIngredients as $LeIngredient)
    {
      if ($DEBUG_MODE)
      {
        echo "<p>Ingredient $Compteur : $LeIngredient</p>";
      }
      $Clause=$Clause."$LeIngredient,"; //Clause WHERE
    }
    //Ici on modifie la clause Clause car il y a une virgule de trop.
    $Longueur=strlen($Clause);
    $Longueur--;
    $Clause=substr($Clause,0,$Longueur);
    $Clause=$Clause.")";
    if ($DEBUG_MODE)
    {
      echo "<p>Longueur =$Longueur</p>\n";
      echo "<p>Nombre : $Compte<br>Phrase=\"$Clause\"</p>\n";
    }
 /* ////////////////////////////////////////////////////////////////////////
  */

  /*
    Selectionner les noms, les id_nom dans la table lien où tous les ingredients sont cités
    A voir !!!!!
 Voici la requete :
 SELECT Id_R_Recette
  FROM T_liens
  WHERE Id_R_Ingredient
  IN ( 1, 6 )  //Numéro des ingrédients
  GROUP BY Id_R_Recette
  HAVING COUNT( 1 ) >=x    x, nbre d'ingrédients.
  */
 //Connexion a la base de donnees
        //Connexion a la base de donnee
    $OK=FALSE;
      $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

// On doit renvoyer la variable Choix qui est l'ID de la recette.
    $SQLS0="SELECT ";
    $SQLS1= "T_liens.Id_R_Recette, T_Recette.Nom_Recette FROM T_liens INNER JOIN T_recette ON T_Liens.Id_R_Recette=T_Recette.Id_Recette ";
    $SQLS2="WHERE Id_R_Ingredient IN ";
    $SQLS3=" GROUP BY Id_R_Recette HAVING COUNT(1) >=";
	$SQLS_Compte="select count(*) as nbre FROM T_liens INNER JOIN T_recette ON T_Liens.Id_R_Recette=T_Recette.Id_Recette WHERE Id_R_Ingredient IN $Clause";
    switch($TheChoice)
    {
      case 0 : {
                 $SQLS=$SQLS0."DISTINCT ".$SQLS1.$SQLS2.$Clause;
				 
                 break;
               }
      case 1 : {
                 $SQLS=$SQLS0.$SQLS1.$SQLS2.$Clause.$SQLS3.$Compte;
				 
                 break;
               }
    }
   // echo $SQLS_Compte;
	if ($DEBUG_MODE)
    {
      echo "<p>Requete : \" $SQLS \"</p>";
    }
    foreach($connecter->query($SQLS_Compte) as $row)
	{
		$nb=$row["nbre"];
	}
//Si il y a une réponse
    if ($nb!=0)
    {
//Affichage de la page
      echo "<H2><span id=titrepage>Liste des cocktails contenant les ingr&eacute;dients choisis.</span></H2>\n";
      echo "<FORM NAME=\"selection\" ACTION=\"afficherecette.php\" METHOD=\"POST\">\n";
      echo "<p><u><b>Votre choix</b></u> : </p>\n<p>";
//On affiche la tete de présentation avec le nom et le type de la recette (couleur ?).
      foreach($connecter->query($SQLS) as $row)
      {
         echo '<INPUT TYPE="radio" NAME="Choix" VALUE="'.$row["Id_R_Recette"]."\">".$row["Nom_Recette"]." &nbsp;<img src=\"images/$Puce2\"><br>\n";
      }
      echo "</p>\n";
      echo "<p><INPUT TYPE=\"submit\" VALUE=\"Afficher\"></p>\n";
      echo "</FORM>";
    }
    else
    {
      echo "<p>Il n'y a aucune recette correspondante au critère demandé</p>\n";
    }
//Fin de la condition ELSE
  }
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"find.php\">Retour</a></p>\n";
  echo "<p><img src=\"images/$Puce1\" border=\"0\"><a href=\"index.php\">Index</a></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "footer.php";
  echo "</body>\n";
  echo "</html>\n";