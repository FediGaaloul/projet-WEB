<?php
include_once '../config.php';
include_once '../Model/Utilisateur.php';

class UtilisateurC
{
    function afficherUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function supprimerUtilisateur($id_user)
    {
        $sql = "DELETE FROM utilisateur WHERE id_user=:id_user";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_user', $id_user);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function ajouterUtilisateur($utilisateur)
    {
        $sql = "INSERT INTO utilisateur (id_user, nom, prenom, email, mots_de_passe) 
                VALUES (:id_user, :nom, :prenom, :email, :mots_de_passe)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_user' => $utilisateur->getid_user(),
                'nom' => $utilisateur->getnom(),
                'prenom' => $utilisateur->getprenom(),
                'email' => $utilisateur->getemail(),
                'mots_de_passe' => $utilisateur->getmots_de_passe()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererUtilisateur($id_user)
    {
        $sql = "SELECT * from utilisateur where id_user=$id_user";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $utilisateur = $query->fetch();
            return $utilisateur;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierUtilisateur($utilisateur, $id_user)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    nom= :nom, 
                    prenom= :prenom, 
                    email= :email, 
                    mots_de_passe= :mots_de_passe
                WHERE id_user= :id_user'
            );
            $query->execute([
                'nom' => $utilisateur->getnom(),
                'prenom' => $utilisateur->getprenom(),
                'email' => $utilisateur->getemail(),
                'mots_de_passe' => $utilisateur->getmots_de_passe(),
                'id_user' => $id_user
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
