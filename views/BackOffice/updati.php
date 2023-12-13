<?php

include_once '../Controller/inter.php';
include_once '../Model/intermodel.php';
include_once '../Controller/tache.php';
$erreur = "";

// Créer un ticket initialisé à null
$inter = null;
// Créer une instance du contrôleur TicketC
$interC = new interC();
$qqq = $TicketC->listTickets();
var_dump($_POST);
if (
    isset($_POST["IDt"]) &&
    isset($_POST["type_interv"]) 
    
    ) {
        if (
            !empty($_POST['IDt']) &&
            !empty($_POST["type_interv"]) 
           
            ) {
        $inter = new inter(
            null, // Laissez null pour que la base de données utilise l'auto-incrémentation (IDT)
            $_POST['IDt'],
            $_POST['type_interv']
           
        );

        // Utilisez la méthode updateTicket de TicketC pour mettre à jour le ticket
        $interC->updatinter($inter, $_GET['IDi']);
        
        // Redirection vers une page listant les tickets après la mise à jour
        header('Location: listi.php');
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

    if (isset($_GET['IDi'])) {
        $interC = new interC();
        $inter = $interC->showinter($_GET['IDi']); // Récupérer les détails du ticket à partir de la méthode showTicket

        if ($inter) { // Vérifier si le ticket existe
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
                        <td><label for="priorite">Priorité :</label></td>
                        <td>
                            <input type="text" id="priorite" name="priorite" value="<?php echo $ticket['priorite'] ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Save">
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



