
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
            $contenu .= 'Erreur de MDP';
        }       
    }
    else
    {
        $contenu .= 'Aucun compte trouvé avec cette adresse mail
        <a href=".\inscription.php\"><u>Cliquez ici pour vous inscrire</u></a>
        ';
    }
}

require_once("inc/haut.inc.php");
echo $contenu;
?>

<form method="post" action="" class="forms">
<h1>CONNEXION</h1>
    <label for="email">Email</label><br />
    <input type="text" id="email" name="email" /><br /> <br />
         
    <label for="mdp">Mot de passe</label><br />
    <input type="password" id="mdp" name="mdp" /><br /><br />
 
    <p class="inscription">Je n'ai pas de <span>compte</span>. <a href="#">Je m'en <span>crée</span> un.</p></a>
    <div align="center">
      <button type="submit">Se connecter</button>
    </div>
</form>

<?php
require_once("inc/bas.inc.php");