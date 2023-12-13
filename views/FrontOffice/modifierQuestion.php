<?php
include_once '../../Model/Questions.php';
include_once '../../Controller/QuestionC.php';

$error = "";
$question = null;
$questionC = new QuestionsC();

if (isset($_POST["id_quest"]) && isset($_POST["question"]) && isset($_POST["id_quiz"])) {
    if (!empty($_POST["id_quest"]) && !empty($_POST['question']) && !empty($_POST['id_quiz'])) {
        $question = new Questions(
            $_POST['id_quest'],
            $_POST['question'],
            $_POST['id_quiz']
        );
        $questionC->modifierQuestions($question, $_POST["id_quest"]);
        header('Location: afficherListeQuestion.php');
        exit(); // Arrêter l'exécution après la redirection
    } else {
        $error = "Veuillez remplir tous les champs.";
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
    <link rel="icon" type="../image/x-icon" href="logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
    <script>
        function validateForm() {
    var question = document.getElementById("question").value;

    if (question === "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }

    // Utilisation d'une expression régulière pour vérifier si la question se termine par un ?
    if (!/\?$/.test(question)) {
        alert("La question doit se terminer par un point d'interrogation (?)");
        return false;
    }

    return true;
}
    </script>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">ApprenTech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="afficherListeQuestion.php">Liste des Question</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content -->
        <!-- Page content -->
        <section class="py-5">
            <div class="container px-5">
                <div id="error" class="text-danger">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_POST['id_quest'])) {
                    $question = $questionC->recupererQuestions($_POST['id_quest']);
                ?>
                    <form action="" method="POST" onsubmit="return validateForm()">
                        <table class="table" border="1" align="center">
                            <tr>
                                <td>
                                    <label for="question">Question:</label>
                                </td>
                                <td>
                                    <input type="text" name="question" id="question" value="<?php echo htmlspecialchars($question['question']); ?>" maxlength="200">
                                </td>
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