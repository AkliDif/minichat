<?php
require_once('./inc/config.php');

if ($_GET)
{
    $id_receiver = $_GET['id_receiver'];
}

$res = executeRequete ("SELECT * FROM client as c JOIN message as m ON c.id_client = m.id_sender WHERE id_receiver = ".$_SESSION['client']['id_client']." AND id_sender = ".$id_receiver." OR  id_receiver =".$id_receiver." AND id_sender = ".$_SESSION['client']['id_client']."");
while ($msg = $res->fetch_assoc())//afficher les messages;
{
    if ($msg['id_sender'] == $_SESSION['client']['id_client'])
    {
        $contenu .= '<div class="sender"> '. $msg['nom'] . '  '.$msg['prenom'].'</div>';
        $contenu .= '<div class="message_sender"> '. $msg['message'] . '</div>';
    }
    elseif ($msg['id_receiver'] == $id_receiver)
    {
        $contenu .= '<div class="receiver"> '. $msg['nom'] . '  '.$msg['prenom'].'</div>';
        $contenu .= '<div class="message_receiver"> '. $msg['message'] . '</div>';
    }
}

require_once ('./inc/haut.inc.php');

echo $contenu;

?>
    <form method="post" action="envoieMessage.php" class="forms" id="msg_form">
        <label for="message">Message</label><br />
        <textarea id="message" name="message" rows="4" cols="50" form="msg_form" required="required"></textarea></br>
        <input type="hidden"  name="id_receiver" value="<?php echo $id_receiver ?>" />
    
        <input type="submit" value="envoyer"/>
    </form>

<?php
    require_once ('./inc/bas.inc.php');