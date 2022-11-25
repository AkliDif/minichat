
<?php
require_once("config.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['action']) && $_GET['action'] == "deconnexion") 
{
	session_destroy(); 
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

echo $contenu;
?>
<p class="forms-titles">CONNEXION</p>
<form method="post" action="" class="forms">
    <label for="email">Email</label><br />
    <input type="text" id="email" name="email" /><br /> <br />
         
    <label for="mdp">Mot de passe</label><br />
    <input type="password" id="mdp" name="mdp" /><br /><br />
 
     <input type="submit" value="CONNEXION"/>
</form>