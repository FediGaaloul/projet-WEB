<?php
include "../controller/inter.php"; // Assurez-vous que le chemin du fichier et le nom de la classe sont corrects

$c = new interC();
$tab = $c->listinter(); // Utilisation de la méthode listTickets pour récupérer la liste des tickets

?>

<center>
    <h1>List of interractions</h1>
    <h2>
        <a href="addi.php">Add interraction</a>


    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id interraction</th>
        <th>ID ticket</th>
        <th>Type interraction</th>
        <th>update</th>
        <th>delete</th>
     </tr>

    <?php
    foreach ($tab as $inter) {
    ?>
        <tr>
            <td><?= $inter['IDi']; ?></td>
            <td><?= $inter['IDt']; ?></td>
            <td><?= $inter['type_interv']; ?></td>
            <td>
                        <form method="POST" action="updati.php">
                        <a href="updati.php?IDt=<?php echo $inter['IDi']; ?>">modifier</a>
                        </form>
                    </td>
                    <td>
                        <a href="deleti.php?IDt=<?php echo $inter['IDt']; ?>">Supprimer</a>
                    </td>
            
        </tr>
    <?php
    }
    ?>
</table>
