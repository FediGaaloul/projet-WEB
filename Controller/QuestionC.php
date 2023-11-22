<?php
include '../config.php';
include_once '../Model/Questions.php';
class questionsC
{
	function afficherQuestions()
	{
		$sql = "SELECT * FROM questions";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function supprimerQuestions($id_quest)
	{
		$sql = "DELETE FROM questions WHERE id_quest=:id_quest";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_quest', $id_quest);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterQuestions($questions)
	{
		$sql = "INSERT INTO questions (id_quest, question , id_quiz) 
			VALUES (:id_quest,:question,:id_quiz)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id_quest' => $questions->getid_quest(),
				'question' => $questions->getquestion(),
                'id_quiz'=> $questions->getid_quiz()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererQuestions($id_quest)
	{
		$sql = "SELECT * from questions where id_quest=$id_quest";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$Questions = $query->fetch();
			return $Questions;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierQuestions($Questions, $id_quest)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE questions SET 
						question= :question
					WHERE id_quest= :id_quest'
			);
			$query->execute([
				'question' => $Questions->getquestion(),
				'id_quest' => $id_quest
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}