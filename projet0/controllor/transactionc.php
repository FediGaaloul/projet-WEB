<?php
include_once '../config.php';
include_once '../model/transaction.php'; 
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
        $sql = "INSERT INTO transact (id_cours, id_user, id, montant, date_transaction)
                VALUES (:id_cours, :id_user, :id, :montant, :date_transaction)";
        $db = config::getConnexion();
        try {
            var_dump($transaction);
            $query = $db->prepare($sql);
            $query->execute([
                'id_cours' => $transaction->getIdCours(),
                'id_user' => $transaction->getIdUser(),
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
                        id_cours = :id_cours, 
                        id_user = :id_user, 
                        id = :id, 
                        montant = :montant, 
                        date_transaction = :date_transaction, 
                    WHERE id_transaction = :id'
            );
            $query->execute([
                'id_cours' => $transaction->getIdCours(),
                'id_user' => $transaction->getIdUser(),
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
