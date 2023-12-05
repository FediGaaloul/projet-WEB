<?php
include_once 'db.php'; // Assurez-vous d'inclure votre fichier db.php ici

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $note = $_POST['note'];
    $titre = $_POST['titre'];
    $commentaire = $_POST['commentaire'];

    // Ajoutez le code pour valider et traiter les données, puis les stocker dans la base de données
    // Assurez-vous de traiter ces données de manière sécurisée pour éviter les injections SQL

    $sql = "INSERT INTO avis (note, titre, commentaire) VALUES ('$note', '$titre', '$commentaire')";

    if ($conn->query($sql) === TRUE) {
        echo "Avis ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'avis: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mettez vos balises meta, liens CSS et scripts ici -->
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Votre barre de navigation reste inchangée -->
        </nav>
        <!-- Page content -->
        <section class="py-5">
            <button><a href="ajoutercours.php">Ajouter un cours</a></button>
            <button><a href="ajouteravis.php">Ajouter un avis</a></button>

            <center>
                <h1>Formulaire d'Avis</h1>
            </center>

            <!-- Formulaire d'avis -->
            <form action="" method="POST">
                <label for="note">Note :</label>
                <input type="text" name="note" id="note" required>

                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" required>

                <label for="commentaire">Commentaire :</label>
                <textarea name="commentaire" id="commentaire" required></textarea>

                <!-- Ajoutez d'autres champs si nécessaire -->

                <input type="submit" value="Ajouter l'avis">
            </form>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-dark py-4 mt-auto">
        <!-- Votre pied de page reste inchangé -->
    </footer>
    <!-- Bootstrap core JS et Core theme JS -->
    <!-- Vos liens vers les scripts Bootstrap et vos scripts personnalisés restent inchangés -->
</body>

</html>