<?php
require_once('./inc/config.php');

if (empty($contenu))
{
    if ($_POST)
    {

        $id_receiver = $_POST['id_receiver'];
        $id_sender = $_SESSION['client']['id_client'];
        $msg = $_POST['message'];

        executeRequete ("INSERT INTO message (id_sender, id_receiver, message, date_heure) VALUES ('$id_sender', '$id_receiver', '$msg', now())");
        header("location:discussion.php?id_receiver=$id_receiver");
    }

};