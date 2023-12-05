<?php
include_once '../Model/Question_opt.php';
include_once '../Controller/Question_optC.php';
include_once '../Controller/QuestionC.php';  // Ajout pour récupérer la liste des questions

$error = "";

// Récupérer la liste des questions pour le menu déroulant
$questionsController = new questionsC();
$questions = $questionsController->afficherQuestions();

// Créer une instance du contrôleur pour les options de question
$questionOptController = new Question_optC();

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider et traiter les données du formulaire
    if (
        isset($_POST["id_opt"]) &&
        isset($_POST["opt"]) &&
        isset($_POST["is_right"]) &&
        isset($_POST["id_quest"])
    ) {
        $id_opt = $_POST['id_opt'];
        $opt = $_POST['opt'];
        $is_right = $_POST['is_right'];
        $id_quest = $_POST['id_quest'];

        // Effectuer des validations si nécessaire

        // Créer un nouvel objet Question_opt
        $newQuestionOpt = new Question_opt($id_opt, $is_right, $opt, $id_quest);

        // Ajouter la nouvelle option de question
        $questionOptController->ajouterQuestion_opt($newQuestionOpt);

        // Rediriger vers une page de succès ou effectuer d'autres actions
        header('Location: afficherListeQuestion_opt.php');
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
    <title>Ajouter Option </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <script>
        function validateForm() {
            var idOpt = document.getElementById("id_opt").value;
            var opt = document.getElementById("opt").value;
            var idQuest = document.getElementById("id_quest").value;
            var isRight = document.getElementById("is_right").value;

            if( (idOpt == "" || opt == "" || idQuest == "" || isRight == "") || (isRight !== "0" && isRight !== "1")){
                alert("Veuillez remplir tous les champs et La valeur de is_right doit être soit 0, soit 1");
                return false;
            }
        }
    </script>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">ApprenTech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="afficherListeQuestion_opt.php">Liste des
                                Options</a></li>
                        <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                            </ul>
                        </li>
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

                <form action="" method="POST" onsubmit="return validateForm()">
                    <table class="table" border="1" align="center">
                        <tr>
                            <td>
                                <label for="id_opt">ID Question_opt:
                                </label>
                            </td>
                            <td><input type="text" name="id_opt" id="id_opt" maxlength="20"></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="opt">Question option:
                                </label>
                            </td>
                            <td><input type="text" name="opt" id="opt" maxlength="200"></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="id_quest">ID Question:</label>
                            </td>
                            <td>
                                <select name="id_quest">
                                    <?php foreach ($questions as $question): ?>
                                        <option value="<?= $question['id_quest'] ?>">
                                            <?= $question['id_quest'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="is_right">is_right:
                                </label>
                            </td>
                            <td>
                                <input type="text" name="is_right" id="is_right" maxlength="1">
                            </td>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Envoyer">
                            </td>
                            <td>
                                <input type="reset" value="Annuler">
                            </td>
                        </tr>
                        <!-- Fin de l'ajout -->
                    </table>
                </form>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
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