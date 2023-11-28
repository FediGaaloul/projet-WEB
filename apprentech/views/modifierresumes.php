<?php
include_once '../Model/resumes.php';
include_once '../Controller/resumeC.php';
$error = "";

// create cours
$resumes = null;

// create an instance of the controller
$resumeC = new resumeC();
if (
    isset($_POST["id_resumes"]) &&
    isset($_POST["id_cours"]) &&
    isset($_POST["Titre_R"]) &&
    isset($_POST["Auteur_etudiant_enseingant"]) &&
    isset($_POST["Date_de_creation"]) 
) {
    if (
        !empty($_POST["id_resumes"]) &&
        !empty($_POST['id_cours']) &&
        !empty($_POST["Titre_R"]) &&
        !empty($_POST["Auteur_etudiant_enseingant"]) &&
        !empty($_POST["Date_de_creation"])
    ) {
        $resumes = new resumes(
            $_POST['id_resumes'],
            $_POST['id_cours'],
            $_POST['Titre_R'],
            $_POST['Auteur_etudiant_enseingant'],
            $_POST['Date_de_creation']
        );
        $resumeC->modifierresumes($resumes, $_POST["id_resumes"]);
        header('Location:afficherresumes.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="afficherresumes.php">Retour à la liste des résumès</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_resumes'])) {
        $resumes = $resumeC->recupererresumes($_POST['id_resumes']);

    ?>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id_resumes">id_resumes:
                    </label>
                </td>
                <td><input type="text" name="id_resumes" id="id_resumes"
                        value="<?php echo $resumes['id_resumes']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="id_cours">id_cours:
                    </label>
                </td>
                <td><input type="id_cours" name="id_cours" id="id_cours" value="<?php echo $resumes['id_cours']; ?>"></td>
            </tr>
            <tr>
                <td>
                    <label for="Titre_R">Titre_R:
                    </label>
                </td>
                <td><input type="text" name="Titre_R" id="Titre_R" value="<?php echo $resumes['Titre_R']; ?>"
                        maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="Auteur_etudiant_enseingant">Auteur_etudiant_enseingant:
                    </label>
                </td>
                <td>
                    <input type="text" name="Auteur_etudiant_enseingant" value="<?php echo $resumes['Auteur_etudiant_enseingant']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Date_de_creation">Date_de_creation :
                    </label>
                </td>
                <td>
                    <input type="Date_de_creation" name="Date_de_creation" id="Date_de_creation" value="<?php echo $resumes['Date_de_creation']; ?>"id="Date_de_creation">
                </td>
            </tr>
            <tr>    
                <td></td>
                <td>
                    <input type="submit" value="Modifier">
                </td>
                <td>
                    <input type="reset" value="Annuler">
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>

</html>