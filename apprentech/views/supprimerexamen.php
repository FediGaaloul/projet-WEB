<?php
	include_once '../Controller/examenC.php';
	$examen=new examenC();
	$examen->supprimerexamen($_GET["id_examen"]);
	header('Location:afficherexamen.php');
?>