<?php
include_once '../Model/Questions.php';
include_once '../Controller/QuestionC.php';

$error = "";
// create Question
$Question = null;
// create an instance of the controller
$QuestionC = new questionsC();

if (
    isset($_POST["id_quest"]) &&
    isset($_POST["question"]) &&
    isset($_POST["id_quiz"])
) {
    if (
        !empty($_POST["id_quest"]) &&
        !empty($_POST['question']) &&
        !empty($_POST['id_quiz'])
    ) {
        $Question = new questions(
            $_POST['id_quest'],
            $_POST['question'],
            $_POST['id_quiz']
        );
        $QuestionC->modifierQuestions($Question, $_POST["id_quest"]);
        header('Location: afficherListeQuestion.php');
        exit(); // Ajout de cette ligne pour arrêter l'exécution après la redirection
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
    <title>Modifier une Question </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <script>
        function validateForm() {
            var idQuest = document.getElementById("id_quest").value;
            var question = document.getElementById("question").value;

            if (idQuest === "" || question === "") {
                alert("Veuillez remplir tous les champs");
                return false;
            }

            return true;
        }
    </script>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">AprenTech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="afficherListeQuestion.php">Liste des Question</a></li>
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

        <!-- Page content -->
        <section class="py-5">
            <div class="container px-5">
                <div id="error">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_POST['id_quest'])) {
                    $Question = $QuestionC->recupererQuestions($_POST['id_quest']);
                ?>
                    <form action="" method="POST" onsubmit="return validateForm()">
                        <table class="table" border="1" align="center">
                            <tr>
                                <td>
                                    <label for="question">Question:
                                    </label>
                                </td>
                                <td><input type="text" name="question" id="question" value="<?php echo $Question['question']; ?>" maxlength="200"></td>
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
            </div>
        </section>
    </main>

    <!-- Footer -->
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
