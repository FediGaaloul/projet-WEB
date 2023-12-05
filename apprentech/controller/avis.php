<?php
include_once 'db.php';

// Endpoint pour récupérer tous les avis
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM avie";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $avie = [];
        while ($row = $result->fetch_assoc()) {
            $avie[] = $row;
        }
        echo json_encode($avie);
    } else {
        echo json_encode([]);
    }
}

// Endpoint pour ajouter un nouvel avis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Validez les données entrantes ici avant de les stocker dans la base de données

    $note = $data['note'];
    $titre = $data['titre'];
    $commentaire = $data['commentaire'];
    $id_utilisateur = $data['id_utilisateur'];

    $sql = "INSERT INTO avie (note, titre, commentaire, utilisateur_id) VALUES ('$note', '$titre', '$commentaire', '$utilisateur_id')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Avis ajouté avec succès"]);
    } else {
        echo json_encode(["error" => "Erreur lors de l'ajout de l'avis: " . $conn->error]);
    }
}

// Ajoutez d'autres endpoints pour la mise à jour, la suppression, etc. (CRUD complet)
?>