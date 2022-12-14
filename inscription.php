<?php
require_once("./inc/config.php");
if(empty($contenu) )
{
	if($_POST) 
	{
		$membre = executeRequete("SELECT * FROM client WHERE adr_mail='$_POST[email]'"); 
		if($membre->num_rows > 0)
		{
			$contenu .= "<div class='erreur'>Un compte avec cette adresse mail existe dejà</div>";
		}
		elseif ($_POST['mdp_conf'] != $_POST['mdp'])
		{
			$contenu .= "<div class='erreur'>Mots de passe différents.</div>";
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
            <input type="nom" name = "nom" placeholder="Nom" required="required"/>
            <input type="prenom" name = "prenom" placeholder="Prenom" required="required" />

            <input type="email" name = "email" placeholder="Email" required="required" />
            <input type="password"  name = "mdp" placeholder="Mot de passe" required="required">
            <input type="password" name="mdp_conf" placeholder="Confirmer votre mot de passe" required="required">
        </div>
    
        <p class="inscription">J'ai déjà un <span>compte</span>. <a href="#">Je me connecte</p></a>
        <div align="center">
            <button type="submit">S'inscrire</button>
        </div>
    </form>
<?php
require_once("inc/bas.inc.php");