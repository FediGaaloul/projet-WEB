<?php
require '../config.php';
include_once '../Model/intermodel.php';
class interC
{
    function listinter()
    {
        $sql = 'SELECT * FROM interract' ;
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function deletinter($IDi)
    {
        $sql = 'DELETE FROM interract WHERE IDi=:IDi';
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IDi', $IDi);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function addinter($inter)
    {
        $sql = "INSERT INTO interract (IDi, IDt, type_interv ) 
                VALUES (:IDi, :IDt, :type_interv )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDi' => $inter->getIDi(),
                'IDt' => $inter->getIDt(),
                'type_interv' => $inter->getTypeinterv()
                
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function showTicket($IDi)
    {
        $sql = 'SELECT * FROM interract WHERE IDi=:IDi';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['IDi'=> $IDi]);
            $inter = $query->fetch();
            return $inter;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateTicket($inter, $IDi)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE interract SET 
                    IDi = :IDi, 
                    IDt = :IDt, 
                    type_interv = :type_interv                      
                WHERE IDi = :IDi"
            );

            $query->execute([
                'IDi' => $IDi,
                'IDt' => $inter-> getIDt(),
                'type_interv' => $inter->getTypeinterv()
                
                
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}?>