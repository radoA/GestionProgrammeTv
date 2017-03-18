<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="style.css" rel="stylesheet" media="all" type="text/css" />
		<title>Bienvenue chez SuperTv !</title>
	</head>
	
	<body>
		<?php 
				//infos nécessaire à la base de donnée 
			//nom de la base de donnée 
			define('NOM',"root") ;
			
			//mot de passe pour accéder à la base de donnée (inexistant dans notre cas)
			define('PASSE',"") ; 
			
			//serveur sur lequels se trouve la base de donnée 
			define('SERVEUR', "localhost") ; 
			
			//base à laquelle on se connecte 
			define('BASE', "tv") ; 
		?>
	</body>
</html>