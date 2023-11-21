<?php
include_once '../Model/Question_opt.php';
include_once '../Controller/Question_optC.php';
$error = "";

// create Question_opt
$Question_opt = null;

// create an instance of the controller
$Question_optC = new Question_optC();
if (
    isset($_POST["id_opt"]) &&
    isset($_POST["opt"])  &&
    isset($_POST["id_quest"]) &&
    isset($_POST["is_right"])
) {
    if (
        !empty($_POST["id_opt"]) &&
        !empty($_POST['opt']) && 
        !empty($_POST['id_quest']) &&
        !empty($_POST['is_right']) 
    ) {
        $Question_opt = new question_opt(
            $_POST['id_opt'],
            $_POST['is_right'],
            $_POST['opt'],
            $_POST['id_quest']
        );
        $Question_optC->modifierQuestion_opt($Question_opt, $_POST["id_opt"]);
        header('Location:afficherListeQuestion_opt.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Modifier Question_opt</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    function validateForm() {
        var idOpt = document.getElementById("id_opt").value;
        var opt = document.getElementById("opt").value;
        var idQuest = document.getElementById("id_quest").value;
        var isRight = document.getElementById("is_right").value;

        if (idOpt == "" || opt == "" || idQuest == "" || isRight == "") {
            alert("Veuillez remplir tous les champs");
            return false;
        }

        // Ajoutez d'autres validations si nécessaire

        return true;
    }
</script>

</head>
<body>
<header>
  <h2>Modifier Question_opt </h2>
</header>

<section>
  <nav>
   <ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item"><a class="nav-link" href="ajouterQuestion_opt.php">Ajouter un Question_opt</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherListeQuestion_opt.php">Retour a la liste des Question_opt</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherlisteQuestion_opt.php">Liste des Question_opts</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                    
                </ul>
            </ul>
  </nav>
  <article>
  <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_opt'])) 
    {
        $Question_opt = $Question_optC->recupererQuestion_opt($_POST['id_opt']);

    ?>

    <form action="" method="POST" onsubmit="return validateForm()>
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id_opt">id_opt:
                    </label>
                </td>
                <td><input type="text" name="id_opt" id="id_opt"
                        value="<?php echo $Question_opt['id_opt']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="opt">opt:
                    </label>
                </td>
                <td><input type="text" name="opt" id="opt" value="<?php echo $Question_opt['opt']; ?>" maxlength="200"></td>
            </tr>
            <tr>
                    <td>
                        <label for="id_quest">ID Question :
                        </label>
                    </td>
                    <td><input type="text" name="id_quest" id="id_quest" maxlength="200"></td>
                </tr>
                <tr>
                    <td>
                        <label for="is_right">is_right:
                        </label>
                    </td>
                    <td><input type="text" name="is_right" id="is_right" maxlength="1"></td>
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
  </article>
</section>

<footer class="bg-dark py-4 mt-auto mb-5">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; AAPPRENTECH </div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

