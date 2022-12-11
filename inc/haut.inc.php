<!Doctype html>
<html>
    <head>
        <title>Mon Site</title>
        <link rel="stylesheet" href="./inc/css/style.css" />
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    </head>
    <body>    
        <header class="mainHead">                    
				<nav>
					<h1 class="logo">Minichat</h1>
					<?php
					if(internauteEstConnecteEtEstAdmin())
					{ 	

						echo '<ul>
						<li><a href="./admin/gestion_membre.php">Gestion des membres</a></li>';
					}
					if(internauteEstConnecte())
					{
						echo '
						<ul>
						<li><a href="./profil.php">Profil</a></li>';
						echo '<li><a href="./connexion.php?action=deconnexion">Déconnexion</a></li>
						</ul>';
					}
					else
					{
						echo '<ul>
						<li><a href="./inscription.php">Inscription</a></li>';
						echo '<li><a href="./connexion.php">Connexion</a></li>';
					}

					?>
				</nav>
        </header>
        <section>
			<div class="conteneur"> 