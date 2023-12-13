<?php
include_once '../../config.php';
include_once '../../Model/resumes.php';
class resumeC
{
	function afficherresumes()
	{
		$sql = "SELECT * FROM resumes";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function supprimerresumes($id_resumes)
	{
		$sql = "DELETE FROM resumes WHERE id_resumes=:id_resumes";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_resumes', $id_resumes);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterresumes($resumes)
	{
		$sql = "INSERT INTO resumes (id_resumes, id_cours, Titre_R, Auteur_etudiant_enseingant, Date_de_creation) 
        VALUES (:id_resumes, :id_cours, :Titre_R, :Auteur_etudiant_enseingant, :Date_de_creation)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id_resumes' => $resumes->getid_resumes(),
                'id_cours' => $resumes->getid_cours(),
				'Titre_R' => $resumes->getTitre_R(),
				'Auteur_etudiant_enseingant' => $resumes->getAuteur_etudiant_enseingant(),               
                'Date_de_creation' => $resumes->getDate_de_creation()

			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererresumes($id_resumes)
	{
		$sql = "SELECT * from resumes where id_resumes=$id_resumes";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$resumes = $query->fetch();
			return $resumes;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierresumes($resumes, $id_resumes)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE resumes SET 
						Titre_R= :Titre_R,
                        Auteur_etudiant_enseingant,
                        Date_de_creation=:Date_de_creation,                    
					WHERE id_resumes= :id_resumes'
			);
			$query->execute([
				'Titre_R' => $resumes->getTitre_R(),
				'Auteur_etudiant_enseingant' => $resumes->getAuteur_etudiant_enseingant(),
				'Date_de_creation' => $resumes->getDate_de_creation(),
				'id_resumes' => $id_resumes
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}