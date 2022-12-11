<?php
require_once("./inc/config.php");
if($_POST)
{
	if(empty($contenu)) 
	{
		$membre = executeRequete("SELECT * FROM client WHERE adr_mail='$_POST[email]'"); 
		if($membre->num_rows > 0)
		{
			$contenu .= "<div class='erreur'>Un compte avec cette adresse mail existe dejà,<a href=.\connexion.php\"><u>Cliquez ici pour vous connecter</u></a> ou choisissez une autre adresse mail.</div>";
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
			executeRequete("INSERT INTO client (nom, prenom, adr_mail, photo, mdp) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[email]','./img/default_img.png' ,'$_POST[mdp]')");

			header("location:connexion.php"); 
		}
	}
}

require_once("inc/haut.inc.php");
?>

<form method="POST" action ="">
     
        <h1>INSCRIPTION</h1>
    
        <div class="inputs">
            <input type="nom" name = "nom" placeholder="Nom" />
            <input type="prenom" name = "prenom" placeholder="Prenom" />

            <input type="email" name = "email" placeholder="Email" />
            <input type="password"  name = "mdp" placeholder="Mot de passe">
            <input type="password" name="mdp_conf" placeholder="Confirmer votre mot de passe">
        </div>
    
        <p class="inscription">J'ai déjà un compte. <a href="connexion.php">Je me connecte</p></a>
        <div align="center">
            <button type="submit">S'inscrire</button>
        </div>
    </form>
<?php
require_once("inc/bas.inc.php");