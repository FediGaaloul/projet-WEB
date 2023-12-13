<?php
include_once '../../config.php';

function listMessageByIdForul($id_form)
{
    $sql = "SELECT * FROM message WHERE id_forum =$id_form";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $message = $query->fetchAll();
        return $message;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


function addMessage($id_form, $contenu)
{
    $sql = "INSERT INTO message (id_forum, contenu) VALUES (:id_forum, :contenu)";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id_forum', $id_form);
        $req->bindValue(':contenu', $contenu);
        $req->execute();
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}


function delete($idMessage)
{
    $db = config::getConnexion();
    $sql = "DELETE FROM message WHERE id = :id_message";
    try {
        $req = $db->prepare($sql);
        $req->bindParam(':id_message', $idMessage);
        $req->execute();
        return true; // Success
    } catch (Exception $e) {
        return false; // Failure
    }
}

function Like($idMessage)
{
    $sql = "UPDATE message SET islike=:islike WHERE id=:id_message";
    $sqladd = "INSERT INTO `likes` (`idmessage`) VALUES (:idmessage)";

    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'islike' => 1,
            'id_message' => $idMessage
        ]);
        $queryadd = $db->prepare($sqladd);
        $queryadd->execute([

            'idmessage' => $idMessage
        ]);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function nbLike($id_message)
{
    $sql = "SELECT COUNT(*) AS nblikes FROM `likes` WHERE idmessage = :id_message";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_message' => $id_message
        ]);
        $like = $query->fetch();

        return $like["nblikes"];
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function DisLike($idMessage)
{
    $sql = "UPDATE message SET isdislike=:isdislike WHERE id=:id_message";
    $sqladd = "INSERT INTO `dislike` (`idmessage`) VALUES (:idmessage)";

    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'isdislike' => 1,
            'id_message' => $idMessage
        ]);
        $queryadd = $db->prepare($sqladd);
        $queryadd->execute([

            'idmessage' => $idMessage
        ]);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function nbDisLike($id_message)
{
    $sql = "SELECT COUNT(*) AS nbdislikes FROM `dislike` WHERE idmessage = :id_message";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_message' => $id_message
        ]);
        $like = $query->fetch();

        return $like["nbdislikes"];
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
