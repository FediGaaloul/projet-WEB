<?php
include '../config.php';
include_once '../Model/Question_opt.php';
class Question_optC
{
	function afficherQuestion_opt()
	{
		$sql = "SELECT * FROM question_opt";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function supprimerQuestion_opt($id_opt)
	{
		$sql = "DELETE FROM question_opt WHERE id_opt=:id_opt";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_opt', $id_opt);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterQuestion_opt($Question_opt)
	{
		$sql = "INSERT INTO question_opt (id_opt, opt,is_right) 
			VALUES (:id_opt,:opt,:is_right)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id_opt' => $Question_opt->getid_opt(),
				'opt' => $Question_opt->getopt(),
				'is_right'=> $Question_opt->getis_right()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererQuestion_opt($id_opt)
	{
		$sql = "SELECT * from question_opt where id_opt=$id_opt";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$Question_opt = $query->fetch();
			return $Question_opt;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierQuestion_opt($Question_opt, $id_opt)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE Question_opt SET 
						opt= :opt,
						is_right=:is_right
					WHERE id_opt= :id_opt'
			);
			$query->execute([
				'opt' => $Question_opt->getopt(),
				'id_opt' => $id_opt,
				'is_right'=> $Question_opt->getis_right()
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}