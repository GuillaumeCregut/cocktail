<?php
$ingredient="CREATE TABLE `t_ingredients` (
  `Id_Ingredient` int(11) NOT NULL auto_increment,
  `Nom_Ingredient` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`Id_Ingredient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;";

$liens="CREATE TABLE `t_liens` (
  `Id_Lien` int(11) NOT NULL auto_increment,
  `Id_R_Ingredient` int(11) NOT NULL default '0',
  `Id_R_Recette` varchar(10) NOT NULL,
  PRIMARY KEY  (`Id_Lien`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;";

$recette="CREATE TABLE `t_recette` (
  `Id_Recette` varchar(10) NOT NULL default '',
  `Type_R` tinyint(4) NOT NULL default '0',
  `Nom_Recette` varchar(30) NOT NULL default '',
  `Preparation` blob NOT NULL,
  PRIMARY KEY  (`Id_Recette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$ttype="CREATE TABLE `t_type` (
  `Id_Type` int(11) NOT NULL auto_increment,
  `Nom_T` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`Id_Type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;";

?>