<?php

require '../config.php';

class userC
{

    public function listusers()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($ide)
    {
        $sql = "DELETE FROM user WHERE iduser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function adduser($user)
    {
        $sql = "INSERT INTO user  (iduser,nom,prenom,tel,email,dateinscription,mdp,verifmdp)
        VALUES (NULL, :nom,:prenom,:tel,:email,:dateinscription,:mdp,:verifmdp)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'tel' => $user->getTel(),
                'email' => $user->getEmail(),
                'dateinscription' => $user->getdateinscription(),
                'mdp' => $user->getmdp(),
                'verifmdp' => $user->getverifmdp()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showuser($id)
    {
        $sql = "SELECT * from user where iduser= $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuser($user, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    tel = :tel,
                    dateinscription =: dateinscription,
                    mdp =: mdp,
                    verifmdp =: verifmdp
                WHERE iduser= :iduser'
            );
            
            $query->execute([
                'iduser' => $id,
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'tel' => $user->getTel(),
                'dateinscription' => $user->getdateinscription(),
                'mdp' => $user->getmdp(),
                'verifmdp' => $user->getverifmdp
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
