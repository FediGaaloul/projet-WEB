<?php

include '../controller/userC.php';
include '../model/user.php';

// create client
$user = null;
// create an instance of the controller
$userC = new userC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"])&&
    isset($_POST["dateinscription"])&&
    isset($_POST["mdp"])&&
    isset($_POST["verifmdp"])
    ) {
        if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"])&&
        !empty($_POST["dateinscription"]) &&
        !empty($_POST["mdp"]) &&
        !empty($_POST["vereifmdp"])
    ) {
        /* foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        } */
        $user = new user(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['dateinscription'],
            $_POST['mdp']
            
        );
        var_dump($user);
        
        $userC->updateuser($user, $_GET['iduser']);

        header('Location:listusers.php');
    }
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listusers.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['iduser'])) {
        $olduser = $userC->showuser($_GET['iduser']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Iduser :</label></td>
                    <td>
                        <input type="text" id="iduser" name="iduserr" value="<?php echo $_GET['iduser'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $olduser['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $olduser['prenom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $olduser['email'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Téléphone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="tel" value="<?php echo $olduser['tel'] ?>" />
                    </td>
                </tr>


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>