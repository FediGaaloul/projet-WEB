<?php

include_once '../Controller/inter.php';
include_once '../Model/intermodel.php';

$error = "";

// create client
$inter = null; // Initialisation de $ticket à null

// Créer une instance du contrôleur TicketC
$interC = new interC();

if (
    isset($_POST["IDt"]) &&
    isset($_POST["type_interv"]) 
 
) {
    if (
        !empty($_POST['IDt']) &&
        !empty($_POST["type_interv"]) 
        ) {
        $inter = new inter(
            $_POST['IDi'], 
            $_POST['IDt'],
            $_POST['type_interv']
           
        );

        // Ajouter le ticket via le contrôleur TicketC
        $interC->addinter($inter);

        // Redirection vers une page listant les tickets d'intervention
        header('Location: listi.php');
    }
}



?>

<html>

<head>
    <meta charset="UTF-8">
    <title>TICKET </title>
<!-- <script>
        function validateForm() {
            let IDT = document.getElementById("IDT").value.trim();
            let type_interv = document.getElementById("type_interv").value.trim();
           
            if (isNaN(IDT) || IDU.length > 20) {
                alert("IDU doit être un numéro ne dépassant pas 20 caractères.");
                return false;
            }

            if (sujet.length === 0) {
                alert("Le sujet ne peut pas être vide.");
                return false;
            }

            if (statut_ticket.length === 0) {
                alert("Le statut du ticket ne peut pas être vide.");
                return false;
            }

          

            if (isNaN(priorite) || priorite.length > 20) {
                alert("La priorité doit être un numéro.");
                return false;
            }

            return true;
        }
    </script>-->
</head>

<body>
    <a href="listi.php">Retour à la liste</a>
    <hr>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table>
            <tr>
                <td><label for="IDt">IDT :</label></td>
                <td>
                    <input type="number" id="IDt" name="IDt" required />
                </td>
            </tr>
            <tr>
                <td><label for="type_interv">type_intervention :</label></td>
                <td>
                    <input type="text" id="type_interv" name="type_interv" required />
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="save">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
