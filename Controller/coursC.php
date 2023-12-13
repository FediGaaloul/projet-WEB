<?php
include_once '../../config.php';
include_once '../../Model/cours.php';
class coursC
{
	public function affichercours()
{
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
    $sql = "SELECT * FROM cours";
    $db = config::getConnexion();

    try {
        $liste = $db->query($sql);
        $listecours = $liste->fetchAll(PDO::FETCH_ASSOC);

        switch ($sort) {
            case 'id_cours_asc':
                usort($listecours, function ($a, $b) {
                    return $a['ID_Cours'] - $b['ID_Cours'];
                });
                break;
            case 'id_cours_desc':
                usort($listecours, function ($a, $b) {
                    return $b['ID_Cours'] - $a['ID_Cours'];
                });
                break;
            default:
                break;
        }

        return $listecours;
    } catch (Exception $e) {
        die('Erreur:' . $e->getMessage());
    }
}
	function supprimercours($ID_Cours)
	{
		$sql = "DELETE FROM cours WHERE ID_Cours=:ID_Cours";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':ID_Cours', $ID_Cours);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajoutercours($cours)
	{
		$sql = "INSERT INTO cours (ID_Cours,Titre_C,Date_D_C,Date_F_C,Categories, ID_utlisateur,Niv_Diff, Status,prix) 
			VALUES (:ID_Cours,:Titre_C,:Date_D_C,:Date_F_C,:Categories, :ID_utlisateur,:Niv_Diff,:Status,:prix)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'ID_Cours' => $cours->getID_Cours(),
				'Titre_C' => $cours->getTitre_C(),
				'Date_D_C' => $cours->getDate_D_C(),
				'Date_F_C' => $cours->getDate_F_C(),
				'ID_utlisateur' => $cours->getID_utlisateur(),
                'Niv_Diff' => $cours->getNiv_Diff(),
                'Categories' => $cours->getCategories(),
                'Status' => $cours->getStatus(),
				'prix' => $cours->getprix(),

			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recuperercours($ID_Cours)
	{
		$sql = "SELECT * from cours where ID_Cours=$ID_Cours";
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

	function modifiercours($cours, $ID_Cours)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE cours SET 
						Titre_C= :Titre_C, 
						Date_D_C= :Date_D_C, 
						Date_F_C= :Date_F_C, 
						Categories= :Categories,
                        Niv_Diff=:Niv_Diff,
                        Status=:Status,
                        ID_utlisateur=:ID_utlisateur
						prix=:prix
					WHERE ID_Cours= :ID_Cours'
			);
			$query->execute([
				'Titre_C' => $cours->getTitre_C(),
				'Date_D_C' => $cours->getDate_D_C(),
				'Date_F_C' => $cours->getDate_F_C(),
				'Categories' => $cours->getCategories(),
                'Status' => $cours->getStatus(),
                'Niv_Diff' => $cours->getNiv_Diff(),
				'prix' => $cours->getprix(),
				'ID_Cours' => $ID_Cours
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}