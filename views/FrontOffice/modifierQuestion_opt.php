<?php
include_once '../../Model/Question_opt.php';
include_once '../../Controller/Question_optC.php';
$error = "";

// create Question_opt
$Question_opt = null;

// create an instance of the controller
$Question_optC = new Question_optC();
if (
    isset($_POST["id_opt"]) &&
    isset($_POST["opt"]) &&
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
        exit();
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Modifier une Option </title>
    <!-- Favicon-->
    <link rel="icon" type="../image/x-icon" href="logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
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
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">ApprenTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="afficherListeQuestion_opt.php">Liste des Options</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <div id="error">
                <?php echo $error; ?>
            </div>

            <?php
            if (isset($_POST['id_opt'])) {
                $Question_opt = $Question_optC->recupererQuestion_opt($_POST['id_opt']);

                if ($Question_opt) {
                    ?>
                    <!-- Your HTML form here -->
                    <form action="" method="POST" onsubmit="return validateForm()">
                        <!-- Your form fields with values from $Question_opt -->
                        <table class="table" border="1" align="center">
                            <tr>
                                <td>
                                    <label for="id_opt">ID Option:
                                    </label>
                                </td>
                                <td><input type="text" name="id_opt" id="id_opt"
                                           value="<?php echo $Question_opt['id_opt']; ?>" maxlength="20"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="opt">Option:
                                    </label>
                                </td>
                                <td><input type="text" name="opt" id="opt"
                                           value="<?php echo $Question_opt['opt']; ?>" maxlength="200"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="is_right">is_right:
                                    </label>
                                </td>
                                <td><input type="text" name="is_right" id="is_right"
                                           value="<?php echo $Question_opt['is_right']; ?>" maxlength="1"></td>
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
                } else {
                    echo "Question_opt not found."; // You can handle this case as needed
                }
            }
            ?>
        </div>
    </section>
</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
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
