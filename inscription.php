<?php
require_once("config.php");
if($_POST)
{
	//debug($_POST);
	if(empty($contenu)) 
	{
		$membre = executeRequete("SELECT * FROM client WHERE adr_mail='$_POST[email]'"); 
		if($membre->num_rows > 0)
		{
			$contenu .= "<div class='erreur'>Un compte avec cette adresse mail existe dejà,<a href=.\connexion.php\"><u>Cliquez ici pour vous connecter</u></a> ou choisissez une autre adresse mail.</div>";
		}
		$membre = executeRequete("SELECT * FROM client WHERE pseudo='$_POST[pseudo]'"); 
		if($membre->num_rows > 0)
		{
			$contenu .= "<div class='erreur'>Pseudo déjà utilisé</div>";
		}
		elseif ($_POST['mdp_conf'] != $_POST['mdp'])
		{
			$contenu .= "<div class='erreur'>Mot de passe différents.</div>";
		}
		else
		{	
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlEntities(addSlashes($valeur));
			}
			executeRequete("INSERT INTO client (sexe, nom, prenom, adr_mail, date_naissance, mdp) VALUES ('$_POST[sexe]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[datedenaissance]', '$_POST[mdp]')");

			header("location:connexion.php"); 
		}
	}
}
?>

<form method="post" action="" class="forms">
	<label for="sexe"></label><br>
	<input name="sexe" value="m" checked="" type="radio">M
	<input name="sexe" value="f" type="radio">Mme<br><br>
		
	<label for="nom">Nom</label><br>
	<input type="text" id="nom" name="nom" placeholder="votre nom"><br><br>
		
	<label for="prenom">Prénom</label><br>
	<input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>

	<label for="email">Email</label><br>
	<input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>

	<label for="text">Pseudo</label><br>
	<input type="pseudo" id="pseudo" name="pseudo" placeholder=""><br><br>
		
	<label for="mdp">Mot de passe</label><br>
	<input type="password" id="mdp" name="mdp" minlength="8" required="required" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractéres acceptés : a-zA-Z0-9-_."><br><br>

	<label for="mdp_conf">Confirmation de mot de passe</label><br>
	<input type="password" id="mdp_conf" name="mdp_conf" minlength="8" required="required"><br><br>
				
	<label for="ville">Date de naissance</label><br>
	<input type="date" id="datedenaissance" name="datedenaissance" placeholder="datedenaissance" ><br>

	<input name="inscription" value="S'inscrire" type="submit">
	
</form>
 