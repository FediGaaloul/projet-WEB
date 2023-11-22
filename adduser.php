<?php

include '../controller/userC.php';
include '../model/user.php';
$erreur="";
// create client
$user = null;

// create an instance of the controller
$userC = new userC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"])&&
    isset($_POST["mdp"])&&
    isset($_POST["verifmdp"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"])&&
        !empty($_POST["mdp"])&&
        !empty($_POST["verifmdp"])
    ) {
        $user = new user(
          $_POST['iduser'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['mdp'],
            $_POST['verifmdp']
        );
        $userC->adduser($user);
        header('Location:listusers.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User </title>
    <script>
        function validateForm() {
            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var email = document.getElementById("email").value;
            var telephone = document.getElementById("telephone").value;
            var mdp = document.getElementById("motdepasse").value;
            var verifmdp = document.getElementById("verifmotdepasse").value;

            if (nom === ""  || prenom === "" || email === "" || telephone === "" || mdp === "" || verifmdp === "") {
                document.getElementById("erreur").innerHTML = "Tous les champs sont obligatoires.";
                return false;
            }

           
            return true;
        }
    </script>
</head>

<body>
    <a href="listusers.php">Back to list </a>
    <hr>

    <form  action="" method="POST" onsubmit="return validateForm()" >
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" id="nom" />
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" id="prenom"/>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" id="email"/>
                </td>
            </tr>
            <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" id="tel"/>
                </td>
            </tr>
            <tr>
                <td><label for="dateinscription">Date inscription :</label></td>
                <td>
                    <input type="date" id="dateinscription" name="dateinscription" id="dateinscription"/>
                </td>
            </tr>
            <tr>
                <td><label for="mdp">Mot de passe  :</label></td>
                <td>
                    <input type="password" id="motdepasse" name="mdp" id="mdp"/>
                </td>
            </tr>
            <tr>
                <td><label for="verifmdp">Verification du  Mot de passe  :</label></td>
                <td>
                    <input type="password" id="verifmotdepasse" name="verifmdp" id="verifmdp"/>
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
    <p style="color: red ;" id="erreur"></p>
    
</body>

</html>