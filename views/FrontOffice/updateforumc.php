<?php
include_once '../../Controller/forumC.php';
include_once '../../Model/forum.php';

$id = $_POST["id"];
$sujet = $_POST["sujet"];
$description = $_POST["description"];
$forum = new forum($sujet, $description,$type);
updateForum($forum, $id);
header("Location: detailsforum.php?id=$id");
