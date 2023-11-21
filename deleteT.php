<?php

include_once '../Controller/tache.php';
$TicketC = new TicketC();
$TicketC->deleteTicket($_GET["IDT"]);
header('Location:listT.php');



?>