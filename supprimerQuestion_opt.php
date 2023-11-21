<?php
	include '../Controller/Question_optC.php';
	$Question_opt=new Question_optC();
	$Question_opt->supprimerQuestion_opt($_GET["id_opt"]);
	header('Location:afficherListeQuestion_opt.php');
?>