<?php
include_once '../../config.php';
include_once '../../Model/Quiz.php';
class QuizC
{
	
	function afficherQuiz()
	{
		$sql = "SELECT * FROM quiz";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	} 

	function supprimerQuiz($id_quiz)
	{
		$sql = "DELETE FROM quiz WHERE id_quiz=:id_quiz";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_quiz', $id_quiz);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterQuiz($Quiz)
	{
		$sql = "INSERT INTO quiz ( titre) 
			VALUES (:titre)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'titre' => $Quiz->gettitre()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererQuiz($id_quiz)
	{
		$sql = "SELECT * from quiz where id_quiz=$id_quiz";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$Quiz = $query->fetch();
			return $Quiz;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierQuiz($Quiz, $id_quiz)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE quiz SET 
						titre= :titre
					WHERE id_quiz= :id_quiz'
			);
			$query->execute([
				'titre' => $Quiz->gettitre(),
				'id_quiz' => $id_quiz
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}	
	function afficherQuizpag($page = 1, $itemsPerPage = 5)
    {
        $offset = ($page - 1) * $itemsPerPage;
    $sql = "SELECT * FROM quiz LIMIT $offset, $itemsPerPage";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function getTotalQuizzes()
    {
        $sql = "SELECT COUNT(*) as total FROM quiz";
        $db = config::getConnexion();
        $result = $db->query($sql);
        $row = $result->fetch();
        return $row['total'];
    }
}