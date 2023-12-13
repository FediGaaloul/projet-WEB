<?php
include_once '../../Controller/forumC.php';





$forumId = $_GET['id'];

deleteForum($forumId);
header("Location:forum.php?id=$forumId");
