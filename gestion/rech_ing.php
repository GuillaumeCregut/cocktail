<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="../index.css">
<title>Cocktails</title>
<script language="JavaScript">
<!--
function myClose() {
 opener = self;
 self.close();
};
// -->
</script>
</head>
<?php
//Variables d'entree
  if (isset($_POST["dejavu"])) 
  {  
    $AlReady=$_POST["dejavu"];
  }	
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
  echo "<H2 align=\"center\"><span id=titrepage>Recherche d'un ingrédient</span></H2>\n";  //METTRE LE BON TITRE
//Connexion a la base de donnees
  $OK=FALSE;
  $connecter=mysql_connect($host,$userdata,$passdata);
  if ($connecter!=FALSE)
  {
     $dbconn=mysql_select_db($basecocktail);
     if ($dbconn)
     {
        $OK=TRUE;
     }
     else
        die ('base inextistante');
  }
  else
    die ('pb connexion serveur');
// Affichage des action possibles
  if (!(isset($AlReady)))
  {
    echo "<FORM NAME=\"RechRec\" METHOD=\"POST\" ACTIOn\"rech_rec.php\">\n";
    echo "<input type=\"hidden\" name=\"dejavu\" value=\"1234\">\n";
    echo "<p>Entrez le nom de l'ingrédient recherché : <input type=\"text\" name=\"nomrec\">\n";
    echo "<input type=\"submit\" value=\"rechercher\">\n";
    echo "</form>\n";
  }
  else
  {
    if ($AlReady <>"1234")
    {
     die('Erreur');
    }
    $LaCle=$_POST["nomrec"];
    $AlReady="toto";
    $SQLS="SELECT Nom_Ingredient FROM t_ingredients WHERE Nom_Ingredient LIKE \"%$LaCle%\"";
    $query=mysql_query($SQLS);
    if (!$query)
    {
       echo "<br>Erreur<br>";
       echo "<p>Erreur N° ".mysql_errno()." : ".mysql_error()."<br>\n";
       echo "SQLS = $SQLS .";
       die("un probleme de requete a eu lieu, veuillez contacter l'administrateur du systeme");
    }
    while ($row=mysql_fetch_object($query))
    {
      echo "<p>* $row->Nom_Ingredient <img src=\"../images/$Puce2\"></p>\n";
    }
    echo "<form name=\"Retour\" Method=\"Post\" Action=\"rech_ing.php\">\n";
    echo "<p>Autre recherche : <input type=\"text\" name=\"nomrec\"></p>\n";
    echo "<input type=\"hidden\" value=\"1234\" NAME=\"dejavu\">\n";
    echo "<input type=\"submit\" value=\"recherche\">\n";
    echo "</form\">\n";
  }
//Fin de la page
  echo "<p align=\"center\"><input type=\"button\" name=\"b_close\" value=\"Fermer\" onClick=\"myClose();\"></p>\n";

  echo "</td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  include "../footer.php";
  echo "</body>\n";
  echo "</html>\n";
?>