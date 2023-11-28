<?php
include_once '../Model/cours.php';
include_once '../Controller/coursC.php';
$error = "";

// create cours
$cours = null;

// create an instance of the controller
$coursC = new coursC();
if (
    isset($_POST["ID_Cours"]) &&
    isset($_POST["Titre_C"]) &&
    isset($_POST["Date_D_C"]) &&
    isset($_POST["Date_F_C"]) &&
    isset($_POST["Niv_Diff"]) &&
    isset($_POST["Categories"]) &&
    isset($_POST["ID_utlisateur"]) &&
    isset($_POST["Status"]) 
) {
    if (
        !empty($_POST["ID_Cours"]) &&
        !empty($_POST['Titre_C']) &&
        !empty($_POST["Date_D_C"]) &&
        !empty($_POST["Date_F_C"]) &&
        !empty($_POST["Niv_Diff"])&& 
        !empty($_POST["Categories"])&& 
        !empty($_POST["ID_utlisateur"])&&
        !empty($_POST["Status"])

    ) {
        $cours = new cours(
            $_POST['ID_Cours'],
            $_POST['Titre_C'],
            $_POST['Date_D_C'],
            $_POST['Date_F_C'],
            $_POST['Niv_Diff'],
            $_POST['Categories'],
            $_POST['ID_utlisateur'],
            $_POST['Status']
        );
        $coursC->modifiercours($cours, $_POST["ID_Cours"]);
        header('Location:affichercours.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <script>
        function validateForm() {
            var ID_Cours = document.getElementById('ID_Cours').value;
            var Titre_C = document.getElementById('Titre_C').value;
            var Date_D_C = document.getElementById('Date_D_C').value;
            var Date_F_C = document.getElementById('Date_F_C').value;
            var Niv_Diff = document.getElementById('Niv_Diff').value;
            var Categories = document.getElementById('Categories').value;
            var ID_utlisateur = document.getElementById('ID_utlisateur').value;
            var Status = document.getElementById('Status').value;

            if (ID_Cours === "" || Titre_C === "" || Date_D_C === "" || Date_F_C === "" || Niv_Diff === "" || Categories === "" || ID_utlisateur === "" || Status === "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <button><a href="affichercours.php">Retour à la liste des cours</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['ID_Cours'])) {
        $cours = $coursC->recuperercours($_POST['ID_Cours']);

    ?>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="ID_Cours">ID_Cours:
                    </label>
                </td>
                <td><input type="text" name="ID_Cours" id="ID_Cours"
                        value="<?php echo $cours['ID_Cours']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="Titre_C">Titre_C:
                    </label>
                </td>
                <td><input type="text" name="Titre_C" id="Titre_C" value="<?php echo $cours['Titre_C']; ?>"></td>
            </tr>
            <tr>
                <td>
                    <label for="text">date_de_creation:
                    </label>
                </td>
                <td><input type="text" name="Date_D_C" id="Date_D_C" value="<?php echo $cours['Date_D_C']; ?>"
                        maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="Date_F_C">Date_F_C:
                    </label>
                </td>
                <td>
                    <input type="text" name="Date_F_C" value="<?php echo $cours['Date_F_C']; ?>" id="Date_F_C">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Niv_Diff">Niv_Diff :
                    </label>
                </td>
                <td>
                    <input type="Niv_Diff" name="Niv_Diff" id="Niv_Diff" value="<?php echo $cours['Niv_Diff']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Categories">Categories :
                    </label>
                </td>
                <td>
                    <input type="Categories" name="Categories" id="Categories" value="<?php echo $cours['Categories']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ID_utlisateur">ID_utlisateur :
                    </label>
                </td>
                <td>
                    <input type="texte" name="ID_utlisateur" id="ID_utlisateur" value="<?php echo $cours['ID_utlisateur']; ?>">
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    <label for="Status">Status:
                    </label>
                </td>
                <td>
                    <input type="text" name="Status" id="Status" value="<?php echo $cours['Status']; ?>">
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