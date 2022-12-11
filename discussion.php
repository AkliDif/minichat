<?php
require_once('./inc/config.php');

$res = executeRequete ("SELECT nom, prenom, message FROM client as c, message as m WHERE c.id_client = m.id_sender");
while ($msg = $res->fetch_assoc())//afficher les messages;
{
    $contenu .= '<div class="sender"> '. $msg['nom'] . '  '.$msg['nom'].'</div>';
    $contenu .= '<div class="message"> '. $msg['message'] . '  '.$msg['message'].'</div>';
}

if ($_GET)
{
    $id_receiver = $_GET['id_receiver'];
}

require_once ('./inc/haut.inc.php');

echo $contenu;

?>
<p class="forms-titles">Message</p>
    <form method="post" action="envoieMessage.php" class="forms" id="msg_form">
        <label for="message">Message</label><br />
        <textarea id="message" name="message" rows="4" cols="50" form="msg_form" required="required"></textarea></br>
        <input type="hidden"  name="id_receiver" value="<?php echo $id_receiver ?>" />
    
        <input type="submit" value="envoyer"/>
    </form>

<?php
    require_once ('./inc/bas.inc.php');