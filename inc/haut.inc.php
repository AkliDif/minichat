<!Doctype html>
<html>
    <head>
        <title>Mon Site</title>
        <link rel="stylesheet" href="./inc/css/style.css" />
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    </head>
    <body>    
        <header class="mainHead">                    
					<h1 class="logo">Minichat</h1>
					<?php
					if(internauteEstConnecteEtEstAdmin())
					{ 	

						echo '<ul class="menu">
						<li><a href="#">Gestion des membres</a></li>
						</ul>';
						//    ./admin/gestion_membre.php
					}
					elseif(internauteEstConnecte())
					{
						echo '
						<ul class="menu">
						<li><a href="#">Profil</a></li>';
						echo '<li><a href="./connexion.php?action=deconnexion">Déconnexion</a></li>
						</ul>';
						//  ./profil.php
					}
					else
					{
						echo '<ul class="menu">
						<li><a href="./inscription.php">Inscription</a></li>';
						echo '<li><a href="./connexion.php">Connexion</a></li>';
						echo '</ul>';
					}

					?>
        </header>
        <section>
			<div class="conteneur"> 