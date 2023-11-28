<?php
	include '../Controller/QuestionC.php';
	$Question=new questionsC();
	$Question->supprimerQuestions($_GET["id_quest"]);
	header('Location:afficherListeQuestion.php');
?>