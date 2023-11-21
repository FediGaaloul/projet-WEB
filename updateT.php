<?php

include_once '../Controller/tache.php';
include_once '../Model/crud.php';


// Créer un ticket initialisé à null
$ticket = null;

// Créer une instance du contrôleur TicketC
$TicketC = new TicketC();

if (
    isset($_POST["IDU"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["statut_ticket"]) &&
    isset($_POST["Date_de_creation"]) &&
    isset($_POST["priorite"])
) {
    if (
        !empty($_POST['IDU']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["statut_ticket"]) &&
        !empty($_POST["Date_de_creation"]) &&
        !empty($_POST["priorite"])
    ) {
        $ticket = new Ticket(
            null, // Laissez null pour que la base de données utilise l'auto-incrémentation (IDT)
            $_POST['IDU'],
            $_POST['sujet'],
            $_POST['statut_ticket'],
            $_POST['Date_de_creation'],
            $_POST['priorite']
        );

        // Utilisez la méthode updateTicket de TicketC pour mettre à jour le ticket
        $TicketC->updateTicket($ticket, $_GET['IDT']);

        // Redirection vers une page listant les tickets après la mise à jour
        header('Location: listTickets.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Display and Update</title>
</head>

<body>
    <button><a href="listT.php">Back to list</a></button>
    <hr>

    <?php
   // include '../controller/tache.php'; // Assurez-vous que le chemin vers votre contrôleur est correct

    if (isset($_GET['IDT'])) {
        $ticketC = new TicketC();
        $ticket = $ticketC->showTicket($_GET['IDT']); // Récupérer les détails du ticket à partir de la méthode showTicket

        if ($ticket) { // Vérifier si le ticket existe
    ?>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label for="IDT">ID Ticket :</label></td>
                        <td>
                            <input type="text" id="IDT" name="IDT" value="<?php echo $_GET['IDT'] ?>" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="IDU">ID User :</label></td>
                        <td>
                            <input type="text" id="IDU" name="IDU" value="<?php echo $ticket['IDU'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="sujet">Sujet :</label></td>
                        <td>
                            <input type="text" id="sujet" name="sujet" value="<?php echo $ticket['sujet'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="statut_ticket">Statut :</label></td>
                        <td>
                            <input type="text" id="statut_ticket" name="statut_ticket" value="<?php echo $ticket['statut_ticket'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Date_de_creation">Date de création :</label></td>
                        <td>
                            <input type="text" id="Date_de_creation" name="Date_de_creation" value="<?php echo $ticket['Date_de_creation'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="priorite">Priorité :</label></td>
                        <td>
                            <input type="text" id="priorite" name="priorite" value="<?php echo $ticket['priorite'] ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Save">
                        </td>
                        <td>
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
    <?php
        } else {
            echo "Ticket not found."; // Afficher un message si le ticket n'est pas trouvé
        }
    } else {
        echo "Ticket ID not specified."; // Afficher un message si l'ID du ticket n'est pas spécifié
    }
    ?>
</body>

</html>
