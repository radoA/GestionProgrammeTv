<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="style.css" rel="stylesheet" media="all" type="text/css" />
		<title>Bienvenue chez SuperTv !</title>
	</head>
	
<body>
	<?php
		require("Connect.php");
		$connexion= mysql_pconnect(SERVEUR,"root","");
		if(!$connexion)
		{
			echo "Connexion echoue \n";
		}
		if(!mysql_select_db("tv",$connexion))
		{
		echo "connexion base innexistante";
		}
	?>
	
	
	<table>
		<tr>
			<td>
				<img src="material_projet\IMG\logo.png" alt="logo" />
			</td>
			
			<td>
				<h1>SuperTV</h1>
				<h2>Tous vos programmes préférés en un coup d'oeil!</h2>
			</td>
		</tr>
	</table>

	<h3><a href="accueil.php" >Accueil</a>	<a href="programme.php" >Programme</a>	<a href="rechercheprogramme.php" >Recherche avancée</a>	<a href="prive.php" >Administration</a></h3>


	<?php
			require("fonctions.php");
			$res=mysql_query("Select * FROM chaine");
			AfficheChaine($res);
	?>

</body>
</html>