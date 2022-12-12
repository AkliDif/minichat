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
					<nav>
						<?php
						if(internauteEstConnecteEtEstAdmin())
						{ 	

							echo '<ul>
							<li><a href="#">Gestion des membres</a></li>
							</ul>';
							//    ./admin/gestion_membre.php
						}
						elseif(internauteEstConnecte())
						{
							echo '
							<ul>
							<li><a href="#">Profil</a></li>';
							echo '<li><a href="./connexion.php?action=deconnexion">Déconnexion</a></li>
							</ul>';
							//  ./profil.php
						}
						else
						{
							echo '<ul>
							<li><a href="./inscription.php">Inscription</a></li>';
							echo '<li><a href="./connexion.php">Connexion</a></li>';
							echo '</ul>';
						}

						?>
					</nav>
        </header>
        <section>
			<div class="conteneur"> 