<?php
include_once '../../config.php';
include_once '../../Model/payement.php';

class PayementC
{
    function afficherpayements()
    {
        $sql = "SELECT * FROM payement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function supprimerpayement($id)
    {
        $sql = "DELETE FROM payement WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function ajouterpayement($payement)
    {
        $sql = "INSERT INTO payement (nom_carte, n_carte, d_expiration, cryptogramme)
        VALUES (:nom_carte, :n_carte, :d_expiration, :cryptogramme)";
        $db = config::getConnexion();
        try {
            // var_dump($payement);
            $query = $db->prepare($sql);
            $query->execute([
                'nom_carte' => $payement->getNomCarte(),
                'n_carte' => $payement->getNCarte(),
                'd_expiration' => $payement->getDExpiration(),
                'cryptogramme' => $payement->getCryptogramme(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur PHP: ' . $e->getMessage();
            echo '<br>';
            echo 'Erreur SQL: ' . implode(', ', $query->errorInfo());
        }
    }
    
    
    
    

    function recupererpayement($id)
    {
        $sql = "SELECT * FROM payement WHERE id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            ///$query->bindValue(':id', $id);
            $query->execute();

            $payement = $query->fetch();
            return $payement;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierpayement($payement, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE payement SET 
                        nom_carte = :nom_carte, 
                        n_carte = :n_carte, 
                        d_expiration = :d_expiration, 
                        cryptogramme = :cryptogramme
                    WHERE id = :id'
            );
            $query->execute([
                'nom_carte' => $payement->getNomCarte(),
                'n_carte' => $payement->getNCarte(),
                'd_expiration' => $payement->getDExpiration(),
                'cryptogramme' => $payement->getCryptogramme(),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
