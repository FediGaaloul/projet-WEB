<?php
//include_once '..\config.php';
include_once '..\..\Controller\transactionc.php';

$t = new TransactionC();

if (isset($_GET["id"])) {
    $t->supprimerTransaction($_GET["id"]);
    header('Location:affichertransaction.php');
} 
?>