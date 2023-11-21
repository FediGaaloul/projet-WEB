<?php
include "../controller/tache.php"; // Assurez-vous que le chemin du fichier et le nom de la classe sont corrects

$c = new TicketC();
$tab = $c->listTickets(); // Utilisation de la méthode listTickets pour récupérer la liste des tickets

?>

<center>
    <h1>List of tickets</h1>
    <h2>
        <a href="addT.php">Add ticket</a>
        <a href="deleteT.php">Delete ticket</a>
        <a href="updateT.php">Update ticket</a>

    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Ticket</th>
        <th>ID Utilisateur</th>
        <th>Sujet</th>
        <th>Statut</th>
        <th>Date de creation</th>
        <th>Priorite</th>
          </tr>

    <?php
    foreach ($tab as $ticket) {
    ?>
        <tr>
            <td><?= $ticket['IDT']; ?></td>
            <td><?= $ticket['IDU']; ?></td>
            <td><?= $ticket['sujet']; ?></td>
            <td><?= $ticket['statut_ticket']; ?></td>
            <td><?= $ticket['Date_de_creation']; ?></td>
            <td><?= $ticket['priorite']; ?></td>
            
        </tr>
    <?php
    }
    ?>
</table>
