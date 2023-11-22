<?php
include "../controller/userC.php";

$c = new userC();
$tab = $c->listusers();

?>

<center>
    <h1>List of users</h1>
    <h2>
        <a href="adduser.php">Add User</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id User</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Date Inscription</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $user) {
    ?>
        <tr>
            <td><?= $user['iduser']; ?></td>
            <td><?= $user['nom']; ?></td>
            <td><?= $user['prenom']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['tel']; ?></td>
            <td><?= $user['dateinscription']; ?></td>
<!--            <td>
                <a href="updateusers.php?iduser=<?php //echo $user['iduser']; ?>">Update1</a>
            </td>-->
            <td align="center">
                <form method="POST" action="updateusers.php">
                <a href="updateusers.php?iduser=<?php echo $user['iduser']; ?>">Update</a>
                </form>
            </td>
            <td>
                <a href="deleteuser.php?iduser=<?php echo $user['iduser']; ?>">Delete</a>
                
            </td>
        </tr>
    <?php
    }
    ?>
</table>