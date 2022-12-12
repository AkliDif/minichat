
<?php
require_once("./inc/config.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['action']) && $_GET['action'] == "deconnexion") 
{
	session_destroy();
    header ('location:connexion.php');
}


if($_POST)
{
    $resultat = executeRequete("SELECT * FROM client WHERE adr_mail= '$_POST[email]'");
    if($resultat->num_rows != 0)
    {
        $client = $resultat->fetch_assoc();
        if($client['mdp'] == $_POST['mdp'])
        {
                foreach($client as $indice => $element)
                {
                    if($indice != 'mdp')
                    {
                        $_SESSION['client'][$indice] = $element; 
                    }
                }
                header("location:Chat.php");
        }
        else
        {
            $contenu .= '<div class="erreur"> Mot de passe incorrecte </div>';
        }       
    }
    else
    {
        $contenu .= "<div class='erreur'> Aucun compte trouvé avec cette adresse mail <a href='./inscription.php'><u>Cliquez ici pour vous inscrire</u></a>
        </div>";
    }
}

require_once("inc/haut.inc.php");
echo $contenu;
?>

<form method="post" action="" class="form">
    <h1>CONNEXION</h1>
    <label for="email">Email</label><br />
    <input type="text" id="email" name="email" /><br /> <br />
         
    <label for="mdp">Mot de passe</label><br />
    <input type="password" id="mdp" name="mdp" /><br /><br />
 
    <p class="inscription">Je n'ai pas de compte. <a href="inscription.php">Je m'en crée un.</p></a>
    <div align="center">
      <button type="submit">Se connecter</button>
    </div>
</form>

<?php
require_once("inc/bas.inc.php");