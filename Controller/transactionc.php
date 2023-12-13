<?php
include_once '../../config.php';
include_once '../../Model/transaction.php'; 
class TransactionC
{
    function afficherTransactions()
    {
        $sql = "SELECT * FROM transact";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function supprimerTransaction($id)
    {
        $sql = "DELETE FROM transact WHERE id_transaction=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function ajouterTransaction($transaction)
    {
        $sql = "INSERT INTO transact (ID_Cours, id, montant, date_transaction)
                VALUES (:ID_Cours, :id, :montant, :date_transaction)";
        $db = config::getConnexion();
        try {
            var_dump($transaction);
            $query = $db->prepare($sql);
            $query->execute([
                'ID_Cours' => $transaction->getIdCours(),
                'id' => $transaction->getId(),
                'montant' => $transaction->getMontant(),
                'date_transaction' => $transaction->getDateTransaction()
            ]);
        } catch (Exception $e) {
            echo 'Erreur PHP: ' . $e->getMessage();
            echo '<br>';
            echo 'Erreur SQL: ' . implode(', ', $query->errorInfo());
        }
    }

    function recupererTransaction($id)
    {
        $sql = "SELECT * FROM transact WHERE id_transaction=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $transaction = $query->fetch();
            return $transaction;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierTransaction($transaction, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE transact SET 
                        ID_Cours = :ID_Cours, 
                        id = :id, 
                        montant = :montant, 
                        date_transaction = :date_transaction, 
                    WHERE id_transaction = :id'
            );
            $query->execute([
                'ID_Cours' => $transaction->getIdCours(),

                'id' => $transaction->getId(),
                'montant' => $transaction->getMontant(),
                'date_transaction' => $transaction->getDateTransaction(),
                ':id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
