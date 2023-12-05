<?php
	include_once '../Controller/QuizC.php';
	$Quiz=new QuizC();
	$Quiz->supprimerQuiz($_GET["id_quiz"]);
	header('Location:afficherListeQuiz.php');
?>