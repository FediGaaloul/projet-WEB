<?php
	include_once '../../Controller/coursC.php';
	$cours=new coursC();
	$cours->supprimercours($_GET["ID_Cours"]);
	header('Location:affichercours.php');
?>