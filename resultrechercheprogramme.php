<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="style.css" rel="stylesheet" media="all" type="text/css" />
	</head>
	
	<body>
	
	<?php
		
				require("rechercheprogramme.php");
				require("fonctions.php");
				$connexion= mysql_pconnect(SERVEUR,"root","");
				if(!$connexion)
				{
					echo "<p><em>Connexion echoue </em></p>\n";
				}
				if(!mysql_select_db("tv",$connexion))
				{
					echo "<p><em>connexion base innexistante</em></p>";
				}	

	?>
	
		<?php
			//récupération des différentes données envoyé par la page précédentes
			$vTITRE=$_POST['titre'];
			$vtype = $_POST['type'];
			$vchaine =$_POST['chaine'] ; 
			$vhoraire=$_POST['horaire'] ;
			echo"<p>Resultat de votre recherche</p>";
			
			//Cas TITRE non vide
			if(($vTITRE != "") && ($vtype != 'nulle') && ($vchaine != 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.HEUREDIFF = '$vhoraire' and d.ide = e.ide and e.TITRE = '$vTITRE' and d.nom = c.nom and c.nom='$vchaine' and e.type='$vtype'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE != "") && ($vtype != 'nulle') && ($vchaine != 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide and e.TITRE = '$vTITRE' and d.nom = c.nom and c.nom='$vchaine'and e.type='$vtype'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE != "") && ($vtype != 'nulle') && ($vchaine == 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.HEUREDIFF = '$vhoraire' and d.ide = e.ide and e.TITRE = '$vTITRE' and d.nom = c.nom and e.type='$vtype'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE != "") && ($vtype == 'nulle') && ($vchaine != 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.HEUREDIFF = '$vhoraire' and d.ide = e.ide and e.TITRE = '$vTITRE' and d.nom = c.nom and c.nom='$vchaine'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE != "") && ($vtype == 'nulle') && ($vchaine != 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where  d.ide = e.ide and e.TITRE = '$vTITRE' and d.nom = c.nom and c.nom='$vchaine' ";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			//test simple
			if(($vTITRE != "") && ($vtype == 'nulle') && ($vchaine == 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where( (d.ide = e.ide) and (e.TITRE = '$vTITRE') and (d.nom = c.nom))";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE != "") && ($vtype != 'nulle') && ($vchaine == 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide and e.TITRE = '$vTITRE' and d.nom = c.nom  and e.type='$vtype'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			
			//cas TITRE vide
			if(($vTITRE == "") && ($vtype != 'nulle') && ($vchaine != 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide and d.nom = c.nom  and e.type='$vtype' and c.nom='$vchaine' and d.HEUREDIFF = '$vhoraire'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			//test avec chaine et type
			if(($vTITRE == "") && ($vtype != 'nulle') && ($vchaine != 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where e.type='$vtype' and d.ide = e.ide and d.nom='$vchaine'   and c.nom=d.nom ";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE == "") && ($vtype != 'nulle') && ($vchaine == 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide  and d.nom = c.nom  and e.type='$vtype' and d.HEUREDIFF = '$vhoraire'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE == "") && ($vtype == 'nulle') && ($vchaine != 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide  and d.nom = c.nom  and c.nom='$vchaine' and d.HEUREDIFF = '$vhoraire'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE == "") && ($vtype != 'nulle') && ($vchaine == 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide and d.nom = c.nom  and e.type='$vtype' ";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			//seulement la chaine est demandé
			if(($vTITRE == "") && ($vtype == 'nulle') && ($vchaine != 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide  and d.nom = c.nom  and c.nom='$vchaine' ";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			if(($vTITRE == "") && ($vtype == 'nulle') && ($vchaine == 'nulle') && ($vhoraire != 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide and d.nom = c.nom and d.HEUREDIFF = '$vhoraire'";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			//Si les cases sont vide
			if(($vTITRE == "") && ($vtype == 'nulle') && ($vchaine == 'nulle') && ($vhoraire == 'nulle'))
			{
				$request="Select DISTINCT  c.LOGO,e.TITRE,e.DUREE from DIFFUSER d, EMISSION e, CHAINE c where d.ide = e.ide and d.nom = c.nom";
				if($res=mysql_query($request,$connexion))
				{
					AfficheProgramme($res);
				}
				else
				{
					echo "<p><em> Echec de l affichage de la recherche <em></p>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
		?>
	
	
	</body>
</html>