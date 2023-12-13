<?php
include_once '../../Controller/forumC.php';
include_once '../../Model/forum.php';
$sujet = $_POST['sujet'];
$description = $_POST['description'];
$type = $_POST['type'];
$forum = new forum($sujet, $description, $type);
addForum($forum);

header('Location:forum.php');
