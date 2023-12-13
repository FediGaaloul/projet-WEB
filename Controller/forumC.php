<?php
include_once '../../config.php';

function addForum($forum)
{
    $sujet = $forum->getSujet();
    $description = $forum->getDescription();
    $type = $forum->getType();



    $sql = "INSERT INTO forum (sujet, description,type) VALUES (:sujet, :description, :type)";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->bindValue(':sujet', $sujet);
        $req->bindValue(':description', $description);
        $req->bindValue(':type', $type);

        $req->execute();
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}


function listForum()
{
    $sql = "SELECT * FROM forum";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function getForumById($id)
{
    $sql = "SELECT * from forum where id=:id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id' => $id]);
        $forum = $query->fetch();
        return $forum;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function getForumBySujet($sujet)
{
    $sql = "SELECT * from forum where sujet=:sujet";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['sujet' => $sujet]);
        $forum = $query->fetch();
        return $forum;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


function updateForum($forum, $id)
{
    $sujet = $forum->getSujet();
    $description = $forum->getDescription();

    $sql = "UPDATE forum SET sujet=:sujet, description=:description WHERE id=:id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'sujet' => $sujet,
            'description' => $description,
            'id' => $id
        ]);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
function getForumByType($type)
{
    $sql = "SELECT * from forum where type=:type";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['type' => $type]);
        $forum = $query->fetchAll();
        return $forum;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function getAllTypeforum()
{
    $sql = "SELECT DISTINCT type FROM forum";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $types = $query->fetchAll();
        return $types;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


function deleteForum($idForum)
{
    $db = config::getConnexion();
    $sql = "DELETE FROM Forum WHERE id = :id_forum";
    try {
        $req = $db->prepare($sql);
        $req->bindParam(':id_forum', $idForum);
        $req->execute();
        return true; // Success
    } catch (Exception $e) {
        return false; // Failure
    }
}