<HTML>
<HEAD>
<meta charset="utf-8">
<TITLE>Installatio du package cocktail</TITLE>
</HEAD>
<BODY>
<?php
//Defintions de base
  $ImageWitdh=797;
  $ImageFond="fond.jpg";
  $ImageHeight=202;
  $Puce1="verre.gif";
  $Puce2="anniglass.gif";
// Temporaire
  $CadreChoix="white";
  $CadreChoixEpaisseur=1;
//fin Temporaire
//Recuperation des données arrivantes
  $host=$_POST["serveur"];
  $userdata=$_POST["user"];
  $passdata=$_POST["pass"];
  $basecocktail=$_POST["base"];
  if (isset($_POST["supp"]))
  {
	$supp=$_POST["supp"];
  }
  else
	  $supp='B';
  $NomClient=$_POST["TheName"];
  //$CadreChoix=$_POST["TheCadre"];
  //$CadreChoixEpaisseur=$_POST["TheWidth"];
//Liaison avec la liste de SQL
  include "sql.php";
  echo "<H1>Installation du pack cocktail</H1>";
  echo "<p><u>Suivi des op&eacute;rations :</u></p>";
//Connexion au serveur
  $connecter=new PDO('mysql:host='.$host,$userdata,$passdata);
//Test si suppression de la base
  if ($supp=="A")
  {
    $SQLS="DROP DATABASE `".$basecocktail."`";
    $connecter->exec($SQLS);
  }
//Creation de la base
  $SQLS="CREATE DATABASE $basecocktail DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
  $connecter->exec($SQLS); //or die ('base inexistante'.$connecter->errorInfo());
  $tabErr=$connecter->errorInfo();
  if($tabErr[1]==0)
	  echo "<p>-Base ajout&eacute;e.</p>";
  else
	  die("Erreur de création de la base : ".$tabErr[2]);
  echo "<p><u>-Ajout des tables</u></p>";
  //connexion à la base
  $connecter=new PDO('mysql:host='.$host.';dbname='.$basecocktail,$userdata,$passdata,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
//Ajout des tables
//Ingredient
  $SQLS=$ingredient;
  $connecter->exec($SQLS);// or die ("<p>-Erreur "..". Ajout Table ingredient impossible.</p>");
  $tabErr=$connecter->errorInfo();
  if($tabErr[1]==0)
	  echo "<p>-Table ingredient ajout&eacute;e.</p>";
  else
	  die("Erreur de création de la base : ".$tabErr[2]);
  
//Liens
  $SQLS=$liens;
  $connecter->exec($SQLS);
  $tabErr=$connecter->errorInfo();
  if($tabErr[1]==0)
	   echo "<p>-Table liens ajout&eacute;e.</p>";
  else
	  die("Erreur de création de la base : ".$tabErr[2]);

 
//Types
  $SQLS=$ttype;
  $connecter->exec($SQLS);
  $tabErr=$connecter->errorInfo();
  if($tabErr[1]==0)
	  echo "<p>-Table types ajout&eacute;e.</p>";
  else
	  die("Erreur de création de la base : ".$tabErr[2]);

    
//Recette
  $SQLS=$recette;
  $connecter->exec($SQLS);
  $tabErr=$connecter->errorInfo();
  if($tabErr[1]==0)
	   echo "<p>-Table recette ajout&eacute;e.</p>";
  else
	  die("Erreur de création de la base : ".$tabErr[2]);
   
//Creation du fichier de configuration
  echo "<p><u>Cr&eacute;ation du fichier de configuration</u></p>";
  $fichier=fopen("../config/config.inc.php","w");
  fputs($fichier,"<?php\n");
//
  fputs($fichier,"\$host=\"$host\";  //Connexion a la base de donn&eacute;e\n");
  fputs($fichier,"\$userdata=\"$userdata\"; //Nom de l'utilisateur\n");
  fputs($fichier,"\$passdata=\"$passdata\"; //Mot de passe\n");
  fputs($fichier,"\$basecocktail=\"$basecocktail\";  //Nom de la base\n");
  fputs($fichier,"\$ImageWidth=$ImageWitdh;  //Taille de l'image d'en tete en largeur\n");
  fputs($fichier,"\$ImageFond=\"$ImageFond\";  //Nom de l'image\n");
  fputs($fichier,"\$ImageHeight=$ImageHeight;  //Taille de l'image d'en tete en hauteur\n");
  fputs($fichier,"\$NomClient=\"$NomClient\";  //Personnalisation de la page\n");
  fputs($fichier,"\$Puce1=\"$Puce1\";  //Puce de liste\n");
  fputs($fichier,"\$CadreChoix=\"$CadreChoix\";  //Couleur de fond des cadres de choix\n");
  fputs($fichier,"\$CadreChoixEpaisseur=$CadreChoixEpaisseur;  // Bordure des cadre de choix\n");
  fputs($fichier,"\$Puce2=\"$Puce2\";  //Puce liste r&eacute;sultat\n");
//
  fputs($fichier,"?>");
  $OK=fclose($fichier);
  if ($OK)
  {
    echo "<p>-Cr&eacute;ation du fichier de configuration cr&eacute;&eacute; avec succ&eacute;s.</p>";
  }
  else
    echo "<p>-Cr&eacute;ation du fichier de configuration impossible.</p>";
  echo "<p>Installation termin&eacute;e, veuillez a pr&eacute;sent configurer votre interface <a href=\"../index.php\">ici</a></p>\n";
  echo "<p>Merci d'avoir choisi ce logiciel</p>\n";
  include "../footer.php";
?>
</BODY>
</HTML>