<?php
include_once '../../Model/examen.php';
include_once '../../Controller/examenC.php';
$error = "";

// create cours
$examen = null;

// create an instance of the controller
$examenC = new examenC();
if (
    isset($_POST["id_examen"]) &&
    isset($_POST["ID_Cours"]) &&
    isset($_POST["Date_examen"]) &&
    isset($_POST["duree"]) 
) {
    if (
        !empty($_POST["id_examen"]) &&
        !empty($_POST['ID_Cours']) &&
        !empty($_POST["Date_examen"]) &&
        !empty($_POST["duree"]) 
    ) {
        $examen = new examen(
            $_POST['id_examen'],
            $_POST['ID_Cours'],
            $_POST['Date_examen'],
            $_POST['duree'],
        );
        $examenC->modifierexamen($examen, $_POST["id_examen"]);
        header('Location:afficherexamen.php');
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
            var id_examen = document.getElementById('id_examen').value;
            var ID_Cours = document.getElementById('ID_Cours').value;
            var Date_examen = document.getElementById('Date_examen').value;
            var duree = document.getElementById('duree').value;

            if (id_examen === "" || ID_Cours === "" || Date_examen === "" || duree === "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <button><a href="afficherexamen.php">Retour à la liste des examens</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_examen'])) {
        $examen = $examenC->recupererexamen($_POST['id_examen']);

    ?>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id_examen">id_examen:
                    </label>
                </td>
                <td><input type="text" name="id_examen" id="id_examen"
                        value="<?php echo $examen['id_examen']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="ID_Cours">ID_Cours:
                    </label>
                </td>
                <td><input type="ID_Cours" name="ID_Cours" id="ID_Cours" value="<?php echo $examen['ID_Cours']; ?>"></td>
            </tr>
            <tr>
                <td>
                    <label for="Date_examen">date de l'examen:
                    </label>
                </td>
                <td><input type="text" name="Date_examen" id="Date_examen" value="<?php echo $examen['Date_examen']; ?>"
                        maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="duree">Durée de l'examen:
                    </label>
                </td>
                <td>
                    <input type="text" name="duree" value="<?php echo $examen['duree']; ?>" id="duree">
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