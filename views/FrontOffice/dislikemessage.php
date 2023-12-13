<?php
include_once '../../Controller/messageC.php';

$messageId = $_GET['id'];
$forumId = $_GET['forumId'];
DisLike($messageId);

header("Location:detailsforum.php?id=$forumId");
