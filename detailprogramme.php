<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="style.css" rel="stylesheet" media="all" type="text/css" />
		<title>Bienvenue chez SuperTv !</title>
	</head>
	
	<body>
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
	</body>
</html>
	<?php
	echo"<p>Détail du programme</p>";
		$prog=$_GET['nam'];
		require("Connect.php");
		require("fonctions.php");
		
		$connexion = mysql_pconnect("localhost","root","");
		
		if(!$connexion)
		{
			echo "<em> Problème d'accès à la base </em>";
		}
		if(!mysql_select_db("tv",$connexion))
		{
			echo "connexion base innexistante";
		}
		// echo $prog; //Si on veut vérifier ce que cela renvoie
		$rq="SELECT * FROM EMISSION WHERE TITRE=\"".$prog."\"";
		$res=mysql_query($rq,$connexion);
		if(!($res))
		{
			echo "<em>Problème de requete<em>";
		}
		else
		{
			$emp=mysql_fetch_object($res);
			affichedetailprogramme($emp);
		}
	?>