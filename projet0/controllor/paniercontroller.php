<?php
require_once 'C:\xampp\htdocs\projet0\model\panierModel.php';
require 'C:\xampp\htdocs\projet0\config';

class CoursController
{
    public function listCours()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCours($id)
    {
        $sql = "DELETE FROM cours WHERE id_cours = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

