<?php
//require_once '..\config.php';
require_once '..\..\controller\payementc.php';

$paymentC = new payementC();

if (isset($_GET["id"])) {
    $paymentC->supprimerpayement($_GET["id"]);
    header('Location:afficherpayement.php');
} 
?>
