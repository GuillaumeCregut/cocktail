<?php
  //Definition des include
  include "system.inc.php";
  //fonctions
  function IsFileOK($LeNom,$LaTaille,$LeType,$LErreur)
  {
   $ValRetour=False;
   if ($LErreur==0)
   {
  //Verifie la taille du fichier
     $ErrType=False;
     $ErrTaille=False;
     if(($LaTaille>($MaxTaille*1000)))
     {
    //Erreur
       $ErrTaille=True;
     }
    //Verifie le type de fichier
     if(($LeType!='image/jpeg') AND ($LeType!='image/gif'))
     {
    //Erreur
       $ErreurType=True;
     }
     if (($ErreurType) OR ($ErreurTaille))
     {
       $ValRetour=False;
     }
     else
     {
       $ValRetour=True;
     }
   }
   else
   {
     $ValRetour=False;
   }
   return $ValRetour;
  }
?>