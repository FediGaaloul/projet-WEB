<?php
	include_once '../../Controller/resumeC.php';
	$resumes=new resumeC();
	$resumes->supprimerresumes($_GET["id_resumes"]);
	header('Location:afficherresumes.php');
?>