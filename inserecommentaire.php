<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	</head>
	
	<body>
	
			<?php
				require("Connect.php");
				require("redigecommentaire.php");
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
				echo"<p>";
				//Récup val du formulaire
				$vnom = $_POST['user'];
				$vmdp = $_POST['mdp'];
				$vcom = $_POST['comment'];
				$vtitre= $_POST["vtitre"];
							$res = mysql_query("select NOM from utilisateur where NOM='$vnom'",$connexion);
							$res2 = mysql_query("select PASSWORD from utilisateur where ( NOM='$vnom' and PASSWORD='$vmdp' )",$connexion);
							//Si ce sont les bons log
							if($res && $res2)
							{
								$res = mysql_query("select IDU from utilisateur where NOM='$vnom'",$connexion);
								if($res)
								{
									//On récup l'ID de l'utilisateur 
									$valU = mysql_fetch_object($res);
									
										$res2 = mysql_query("select IDE from emission where IDE='$vtitre'",$connexion);
										if($res2)
										{
											//On récup l'id de l'émission
											$valE = mysql_fetch_object($res2);
											if(empty($valE) || empty($valU))
											{
												echo "<em><p>Mot de passe saisi incorect. </p></em>";
											}
											else
											{
												$d=date("Y-m-d");
												$h=date("H:i");
												if($res3 = mysql_query("insert into commenter values($valE->IDE,$valU->IDU,'$vcom','$d','$h')",$connexion))
												{
													echo "<p> Insertion réussi </p>";
												}
												else
												{
													echo "<p><em>Echec de l'insertion<em></p>";
												}
											}
										//var_dump($valE); Sert de vérif
										}
										else
										{
											echo "<em><p>Erreur de reqête de l'ED. </p></em><br/>";
										}
									
								}
								else
								{
									echo "<em><p>Erreur de reqête de l'ID. </p></em><br/>";
								}
								
								
							}
							//sinon
							else
							{
								echo "<em><p>Mot de passe saisi incorect. </p></em><br/>";

							}
			?>
			
		</body>
</html>