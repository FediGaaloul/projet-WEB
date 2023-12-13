<?php
include_once '../../config.php';
include_once '../../Model/examen.php';
class examenC
{
	function afficherexamen()
	{
		$sql = "SELECT * FROM examen";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function supprimerexamen($id_examen)
	{
		$sql = "DELETE FROM examen WHERE id_examen=:id_examen";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_examen', $id_examen);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterexamen($examen)
	{
		$sql = "INSERT INTO examen (id_examen,ID_Cours,Date_examen,duree) 
			VALUES (:id_examen,:ID_Cours,:Date_examen,:duree)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id_examen' => $examen->getid_examen(),
				'ID_Cours' => $examen->getID_Cours(),
				'Date_examen' => $examen->getDate_examen(),
				'duree' => $examen->getduree()
				
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererexamen($id_examen)
	{
		$sql = "SELECT * from examen where id_examen=$id_examen";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$examen = $query->fetch();
			return $examen;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierexamen($examen, $id_examen)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE examen SET 
						Date_examen= :Date_examen, 
						duree= :duree, 					
                        ID_Cours=:ID_Cours
					WHERE id_examen= :id_examen'
			);
			$query->execute([
				'Date_examen' => $examen->getDate_examen(),
				'duree' => $examen->getduree(),
				'id_examen' => $id_examen
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}