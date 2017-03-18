<html>
	<head>
		<link href="style.css" rel="stylesheet" media="all" type="text/css" />
	</head>
<body>



	<?php
	function AfficheChaine($lignechaine)
	{
		echo"<p>";
		echo "<table align=center>";
			echo"<tr>";
				while($emp=mysql_fetch_object($lignechaine))
				{
					if(!empty($emp))
					{
						
						echo"<td>";?>
						<img src="material_projet\<?php echo"$emp->LOGO"?>" height="80" width="120" alt="<?php echo"$emp->LOGO"?>"/><?php
						echo "</br>$emp->NOM ";
						echo"</td>";
					}
					else
					{
						echo "<td> Attribut vide </td>";
					}
				}
			echo"</tr>";
			echo "</table>";
			
	}
	?>
	
	<?php
		function AfficheProgramme($ligne)
		{
			echo"<p>";
			echo"<table BORDER='1' align=center >";
			
				while($emp=mysql_fetch_object($ligne))
				{
				echo"<tr>";
					if(!empty($emp))
					{
						echo "<td>";?>
						<img src="material_projet\<?php echo"$emp->LOGO"?>" height="80" width="120" alt="<?php echo"$emp->LOGO"?>"/><?php 
						echo"</td>";
						echo "<td>"?>
						<a href="detailprogramme.php?nam=<?php echo "$emp->TITRE"?>" ><?php echo "$emp->TITRE"?></a><?php
						echo "</td>";
						echo "<td> $emp->DUREE min</td>";
					}
					else
					{
						echo "<td> Ligne vide </td>";
					}
				echo "</tr>";
				}
			
			echo "</table>";
		}
	?>

	<?php
	function affichedetailprogramme($programme)
	{
		?><?php
		echo"<p>";
		echo "<table border=1px align=center cellpading='1' font-size=130%>";
			echo "<tr>";
				echo"<td>TITRE</td>";
				echo"<td>RESUME</td>";
				echo"<td>DUREE</td>";
				echo"<td>TYPE</td>";
				echo"<td>COMMENTAIRE</td></tr>";
			echo"<tr>";
					if(!empty($programme))
					{
						echo "<td padding-right=3px> $programme->TITRE </td>";
						echo "<td border=1px solid black> $programme->RESUME </td>";
						echo "<td border=1px> $programme->DUREE </td>";
						echo "<td border=1px> $programme->TYPE </td>";
						echo"<td>";
						$connexion = mysql_pconnect("localhost","root","");
						$rqc="Select * from commenter c, emission e WHERE e.TITRE='$programme->TITRE' and e.IDE=c.IDE ";
						$resc=mysql_query($rqc,$connexion);
						if($resc)
						{
							while($c=mysql_fetch_object($resc))
							{
							if(!empty($c))
							{
									echo"$c->DATECOMM  $c->HEURECOMM</br> $c->COMMENTAIRE </br></br>";
							}
							}
						}
						echo"</td>";
					}
					else
					{
						echo "<td boreder=1px> Programme vide </td>";
					}
			
			echo "</tr>";
			echo "</table>";
			$vtitre=$programme->IDE;?>
			<form method="post" action="redigecommentaire.php">
			<input type="hidden" name="titre" value="<?php echo"".$vtitre."" ?>"</input>
			<center><input type="submit" value="Commenter"/></center>
			</form>
			
			<?php
			
			
	}
	?>
</body>
</html>
