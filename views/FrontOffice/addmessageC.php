<?php
include_once '../../Controller/messageC.php';
include_once '../../Model/message.php';

$idForm = $_POST['idForm'];
$contenu = $_POST['contenu'];

$message = new message($idForm, $contenu);



addMessage($idForm, $contenu);

header("Location:detailsforum.php?id=$idForm");

