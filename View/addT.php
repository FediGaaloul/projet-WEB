<?php

include_once '../Controller/tache.php';
include_once '../Model/crud.php';

$error = "";

// create client
$ticket = null; // Initialisation de $ticket à null

// Créer une instance du contrôleur TicketC
$TicketC = new TicketC();

if (
    isset($_POST["IDU"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["statut_ticket"]) &&
     isset($_POST["priorite"])
) {
    if (
        !empty($_POST['IDU']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["statut_ticket"]) &&
       
        !empty($_POST["priorite"])
    ) {
        // Créer un nouvel objet Ticket avec les données du formulaire
        $ticket = new Ticket(
            $_POST['IDT'], 
            $_POST['IDU'],
            $_POST['sujet'],
            $_POST['statut_ticket'],
    
            $_POST['priorite']
        );

        // Ajouter le ticket via le contrôleur TicketC
        $TicketC->addTicket($ticket);

        // Redirection vers une page listant les tickets d'intervention
        header('Location: listT.php');
    }
}



?>

<html>

<head>
    <meta charset="UTF-8">
    <title>TICKET </title>
    <script>
        function validateForm() {
            let IDU = document.getElementById("IDU").value.trim();
            let sujet = document.getElementById("sujet").value.trim();
            let statut_ticket = document.getElementById("statut_ticket").value.trim();
         
            let priorite = document.getElementById("priorite").value.trim();

            if (isNaN(IDU) || IDU.length > 20) {
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
    </script>
</head>

<body>
    <a href="listT.php">Retour à la liste</a>
    <hr>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table>
            <tr>
                <td><label for="IDU">IDU :</label></td>
                <td>
                    <input type="number" id="IDU" name="IDU" required />
                </td>
            </tr>
            <tr>
                <td><label for="sujet">Sujet :</label></td>
                <td>
                    <input type="text" id="sujet" name="sujet" required />
                </td>
            </tr>
            <tr>
                <td><label for="statut_ticket">Statut du ticket :</label></td>
                <td>
                    <input type="text" id="statut_ticket" name="statut_ticket" required />
                </td>
            </tr>
           
            <tr>
                <td><label for="priorite">Priorité :</label></td>
                <td>
                    <input type="number" id="priorite" name="priorite" required />
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
