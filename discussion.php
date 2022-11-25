<?php
require_once('config.php');

$res = executeRequete ("SELECT * FROM Message;");
while ($msg = $res->fetch_assoc())//afficher les messages;

?>
<p class="forms-titles">Message</p>
    <form method="post" action="" class="forms" id="msg_form">
        <label for="message">Message</label><br />
        <textarea id="message" name="message" rows="4" cols="50" form="msg_form" required="required"></textarea></br>
    
        <input type="submit" value="envoyer"/>
    </form>