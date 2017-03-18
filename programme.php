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
		
		<form method="post" action="resultprogramme.php">
		<p>Recherche de programmes</p>
		<table>
			<tr>
				<td>Jour(YYYY-MM-JJ)</td>
				<td> <input type="date" name="jour"/></td>
			</tr>
			<tr>
				<td>Tranche Horaire </td>
				<td>
					<select name="trancheH" />
					<option value="nulle"></option>
					<option value="matin"> Matin </option>
					<option value="apm"> Après-midi</option>
					<option value="soir"> Soirée/Nuit </option>
					</select>
				</td>
			</tr>
			</table>
			<input type="submit" value="Rechercher"/></p>
		</form>
		
	</body>
</html>

