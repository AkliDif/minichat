<?php
require_once("config.php");
if (empty($contenu))
    {

        if ($_POST)
        {
            $pseudo = $_SESSION['client']['pseudo'];
            executeRequete("INSERT INTO Message (pseudo_receiver, pseudo_sender, Message) VALUES ('$_POST[pseudo]', '$pseudo','$_POST[message]')");
        }
    }
$res = executeRequete("SELECT * FROM client");
$contenu .= '<div class="Users">';
$contenu .= "<ul>";
while($user = $res->fetch_assoc())
{
    if ($user['pseudo'] != $_SESSION['client']['pseudo'])
	    $contenu .= "<li><a href='discussion.php?pseudo="	. $user['pseudo'] . "'> "	. $user['pseudo'] . "</a></li>";
}
$contenu .= "</ul>";
$contenu .= "</div>";
?>
        <header class="mainHead">                    
				<nav>
					<?php
					if(internauteEstConnecte())
					{
						echo '
						<ul>
						<a href="connexion.php?action=deconnexion">Déconnexion</a>
                        </ul>';
					}
					else
					{
                        header("location:connexion.php");
					}

					?>
				</nav>
        </header>
        <section>
			
<?php
    
    echo ("Bonjour ".$_SESSION['client']['nom'] ." ".$_SESSION['client']['prenom'] ."</br>");
    $pseudo = $_SESSION['client']['pseudo'];
    
    echo $contenu;
    


