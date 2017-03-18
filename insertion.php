<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="style.css" rel="stylesheet" media="all" type="text/css" />
	</head>
	
	<body>
	<?php
				require("Connect.php");
				require("prive.php");
				$connexion= mysql_pconnect(SERVEUR,"root","");
				if(!$connexion)
				{
					echo "<em><p>Connexion echoue<em></p> \n";
				}
				if(!mysql_select_db("tv",$connexion))
				{
					echo "<em><p>connexion base innexistante</p><em></br>";
				}
				echo"<p>";
				$idE=(int)$_POST['id'];
				$titre=$_POST['tittle'];
				$resumer=$_POST['res'];
				$duree=(int)$_POST['duree'];
				$type=$_POST['type'];
				$requete="INSERT INTO EMISSION VALUES($idE,'$titre',$duree,'$resumer','$type')";
				$resultat=mysql_query($requete,$connexion);
				if($resultat)
				{
					echo "<p>L'ajout a été effectué avec succès<p>";
				}
				else
				{
					echo "<em><p>Echec de l'ajout</p><em>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
?>				
					
	</body>	
</html>