<html>
<head>
	<link href="style.css" rel="stylesheet" media="all" type="text/css" />
</head>
	<body>
	<?php
	
	require("programme.php");
				
	?>
	<?php
	echo "<p>Résultat de votre recherche</p>";
	function AfficheProgramme( $journee, $horaireDeb, $horaireFin)
	{
		require("Connect.php");
		$connexion= mysql_pconnect(SERVEUR,"root","");
		if(!$connexion)
		{
			echo "<em><p>Connexion echoue</p><em> \n";
		}
		if(!mysql_select_db("tv",$connexion))
		{
			echo "<em><p>connexion base innexistante</p><em></br>";
		}
		$requete="Select * From DIFFUSER WHERE DATEDIFF = '$journee' and (HEUREDIFF <= '$horaireFin' and HEUREDIFF >='$horaireDeb')";
		if($res=mysql_query($requete,$connexion))
		{
			$emp=mysql_fetch_object($res);
			if(!empty($emp))
			{
			
			echo "<table border=1px style='border-collapse:collapse;'>";
			echo"<tr>";
					echo"<td>Chaine</td>";echo "<td></br>Nom Chaine</br></br></td>";
			echo"</tr>";
			while($emp=mysql_fetch_object($res))
			{
				$requete2="Select * from EMISSION WHERE IDE = $emp->IDE";
				if($res2=mysql_query($requete2,$connexion))
				{
					$emp2=mysql_fetch_object($res2); 
					// var_dump($emp2);Pour vérifier ce qu'il y a dans l'objet
					if(!empty($emp2))
					{
					
						echo"<tr>";
							echo"<td>Heure de diffusion </br> Titre du programme</br> Type de l'émission</br></br></br></td>";
							echo "<td>$emp->HEUREDIFF</br>";?>	
						<a href="detailprogramme.php?nam=<?php echo "$emp2->TITRE"?>"><?php echo "$emp2->TITRE</br>";?></a><?php
							echo "$emp2->TYPE</br></br></br>";
							echo"</tr></td>";
					
					}
					else
					{
						echo "<em><p> emp2 Vide</p><em><\br>";
						echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
					}
				}
				else
				{
					echo "<em><p>Problème de requete2</p><em></br>";
					echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
				}
			}
			echo"</table>";
			}
			else
			{
				echo"<em><p>Classe vide</p><em></br>";
				echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
			}?>
			<?php
		}
		else
		{
			echo "<em><p>Problème de requete</p><em></br>";
			echo "<em><p>Message de mySQL: </p><em>".mysql_error($connexion);
		}
	}
	?>

	<?php
	$h=$_POST['trancheH'];
	$d=$_POST['jour'];
	if($h == "matin")
	{
		$hd='05:00:00';
		$hf='11:59:59';
	}
	if($h == "apm")
	{
		$hd='12:00:00';
		$hf='19:59:59';
	}
	if($h == "soir")
	{
		$hd='20:00:00';
		$hf='4:59:59';
	}
	AfficheProgramme( $d, $hd, $hf);
	?>
	

</body>
</html>