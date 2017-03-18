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
		<form action="inserecommentaire.php" method = "post" >
			<p> Saisi d'un commentaire</p>
			<?php 
				//require("fonctions.php");?>
			<input type="hidden" name="vtitre" value="<?php echo $_POST['titre'] ?>"</input>
			<table>
						<tr>
							<td>Utilisateur</td>
							<td> <input type = "text" name = "user"></td>
						</tr>
						<tr>
							<td>Mot de passe</td>
							<td> <input type = "password" name = "mdp"></td>
						</tr>
						<tr>
							<td>Commentaire</td>
							<td> <textarea row="4" name = "comment"> Tapez ici vos commentaires</textarea></td>
						</tr>
			</table>
			<tr>
				<input type = "submit" value = "Envoyer"/>
			</tr>
		</form>
	</body>
</html>