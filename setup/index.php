<html>
<head>
<title>Configuration du logiciel des cocktails</title>
<link rel="stylesheet" type="text/css" href="config.css">
<script language="JavaScript">
<!--
function na_open_window(name, url, width, height)
{
  window.open(url, "name", 'width='+width+',height='+height+',toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no');
}

// -->
</script>
</head>
<?php
//Fichier include
  include "../config/function.inc.php";
  include "../config/config.inc.php";
//Affichage
  echo "<body>\n";
  echo "<H1>Configuration du logiciel de gestion des cocktails</H1>\n";
  echo "<form name=\"update_config\" METHOD=\"POST\" ACTION=\"update.php\">\n";
  echo "<table border=\"1\" width=\"99%\"  cellspacing=\"0\" bordercolordark=\"white\" bordercolorlight=\"black\">\n";
  echo "  <tr>\n";
  echo "      <td colspan=\"2\" class=\"row1\">\n";
  echo "          <p>Configuration fonctionnelle</p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>Nom du serveur :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"HostName\" value=\"$host\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>Nom d'utilisateur :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"UserName\" value=\"$userdata\"></p> \n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>Mot de passe :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"password\" name=\"UserPass\" value=\"$passdata\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>Base de donn&eacute;es :</p>\n";
  echo "      </td> \n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"DataBase\" value=\"$basecocktail\"></p> \n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;Image d'en t&ecirc;te :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"FondImage\" value=\"$ImageFond\"> <input type=\"button\" name=\"BFond\" value=\"Charger\" OnClick=\"na_open_window('Image de fond', 'down.php', 440, 250);\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;Nom ou pr&eacute;nom :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"AfficheNom\" value=\"$NomClient\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;Image de liste :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\"> \n";
  echo "          <p><input type=\"text\" name=\"Puce1\" value=\"$Puce1\"> <input type=\"button\" name=\"BFond\" value=\"Charger\" OnClick=\"na_open_window('Image de fond', 'down.php', 440, 250);\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;Couleur du cadre de choix :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"CouleurCadre\" value=\"$CadreChoix\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;Epaisseur du cade de choix :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p><input type=\"text\" name=\"WeigthCadre\" value=\"$CadreChoixEpaisseur\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;Image de la liste de r&eacute;sultat :</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\"> \n";
  echo "          <p><input type=\"text\" name=\"Puce2\" value=\"$Puce2\"> <input type=\"button\" name=\"BFond\" value=\"Charger\" OnClick=\"na_open_window('Image de fond', 'down.php', 440, 250);\"></p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr> \n";
  echo "      <td colspan=\"2\" class=\"row1\">\n";
  echo "          <p>Configuration esth&eacute;tique</p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
  echo "  <tr> \n";
  echo "      <td class=\"row2\">\n";
  echo "          <p>&nbsp;</p>\n";
  echo "      </td>\n";
  echo "      <td class=\"row3\">\n";
  echo "          <p>&nbsp;</p>\n";
  echo "      </td>\n";
  echo "  </tr>\n";
/***************************************************************************
 *   Squelette du code a rajouter pour avoir les lignes suppmémentaires    *
 *      echo "  <tr> \n";                                                   *
 *      echo "      <td class=\"row2\">\n";                                 *
 *      echo "          <p>Nom de la valeur</p>\n";                         *
 *      echo "      </td>\n";                                               *
 *      echo "      <td class=\"row3\">\n";                                 *
 *      echo "          <p>entree de formulaire</p>\n";                     *
 *      echo "      </td>\n";                                               *
 *      echo "  </tr>\n";                                                   *
 ***************************************************************************/
//ICI C'est la fin des cases de paramétrage, ce qui suit sont les boutons.
  echo "  <tr>\n";
  echo "      <td colspan=\"2\" class=\"row4\" align=\"center\">\n";
  echo "          <table border=\"0\" cellspacing=\"15\">\n";
  echo "            <tr>\n";
  echo "              <td><input type=\"submit\" value=\"Enregistrer\" name=\"Record\"></td>\n";
  echo "              <td><input type=\"reset\" value=\"Reinitialiser\" name=\"Reset\"></td>\n";
  echo "            </tr>\n";
  echo "          </table>\n";
  echo "      </td>\n";
  echo "    </tr>\n";
  echo "</table>\n";
  echo "</form>\n";
  echo "<p><a href=\"../index.php\">Retour</a></p>\n";
  include "../footer.php";
?>
</body>
</html>
