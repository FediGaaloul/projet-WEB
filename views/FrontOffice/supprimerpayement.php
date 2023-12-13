<?php
//include_once '..\config.php';
include_once '..\..\Controller\payementc.php';

$paymentC = new payementC();

if (isset($_GET["id"])) {
    $paymentC->supprimerpayement($_GET["id"]);
    header('Location:afficherpayement.php');
} 
?>
