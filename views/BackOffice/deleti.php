<?php

include_once '../Controller/inter.php';
$interC = new interC();
$interC->deletinter($_GET["IDi"]);
header('Location:listi.php');
?>