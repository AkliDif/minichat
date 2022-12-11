<?php
require_once("./inc/config.php");

$res = executeRequete("SELECT * FROM client");
$contenu .= '<div class="Users">';
$contenu .= "<ul>";
while($user = $res->fetch_assoc())
{
    if ($user['id_client'] != $_SESSION['client']['id_client'])
	    $contenu .= "<li><a href='discussion.php?id_receiver=" . $user['id_client'] . "'> "	. $user['nom'] .' ' . $user['prenom'] . "</a></li>";
}

    require_once('./inc/haut.inc.php');
    echo ("Bonjour ".$_SESSION['client']['nom'] ." ".$_SESSION['client']['prenom'] ."</br>");
    echo $contenu;
    
    require_once('./inc/bas.inc.php');
