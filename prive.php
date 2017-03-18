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
		<?php
		if (!empty($_POST['mdp']) and $_POST['mdp'] == "mdp") 
				{ ?>
					<form action="insertion.php" method = "post" >
					<p> Insertion d'un programme </p>
					<table>
						<tr>
							<td>IDE</td>
							<td><input type="text" name="id"></td>
						</tr>
						<tr>
							<td>Titre</td>
							<td><input type="text" name="tittle"></td>
						</tr>
						<tr>
							<td>Duree</td>
							<td><input type="text" name="duree"></td>
						</tr>
						<tr>
							<td>Resume</td>
							<td><textarea name="res" rows="8" cols="48"> Votre résumer ici </textarea></td>
						</tr>
						<tr>
							<td>Type</td>
							<td>
								<select name="type" />
								<option value="nulle"></option>
								<option value="Emission musicale"> Emission musicale </option>
								<option value="Film"> Film </option>
								<option value="Jeu"> Jeu </option>
								<option value="Reportage"> Reportage </option>
								<option value="Serie"> Serie </option>
								</select>
							</td>
						</tr>
					</table>
					<input type="submit" name="Valider">
					</form>
							
				<?php }
				// sinon, le formulaire s'affiche
				else 
				{ ?>
					<form method = "post" >
					<p> Accès privé</p>
					<table>
						<tr>
							<td>Mot de passe</td>
							<td> <input type = "password" name = "mdp"></td>
						</tr>
					</table>
					<tr>
					<input type = "submit" value = "Envoyer"/>
					</tr>
					</form>
				<?php }
	?>
	</body>
</html>