<?php
include_once '../../Model/Questions.php';
include_once '../../Controller/QuestionC.php';
include_once '../../Controller/QuizC.php';

// Fetch existing qqq to populate the select options
$quizC = new QuizC();
$qqq = $quizC->afficherQuiz();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";
    $qq = new questionsC();

    // Validate and process the form data
    if (
        isset($_POST["question"]) &&
        isset($_POST["id_quiz"])
    ) {
        $question = $_POST['question'];
        $id_quiz = $_POST['id_quiz'];

        // Perform validation if needed

        // Create a new question object
        $newQuestion = new questions(null, $question, $id_quiz);

        // Add the new question
        $qq->ajouterQuestions($newQuestion);

        // Redirect to a success page or perform other actions
        header('Location: afficherListeQuestion.php');
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
    <title>ajouter un Question </title>
    <!-- Favicon-->
    <link rel="icon" type="../image/x-icon" href="logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
<script>
    function validateForm() {
    var question = document.getElementById("question").value;
    var id_quiz = document.getElementById("id_quiz").value;

    // Check if the question is empty
    if( (question.trim() === "") && (id_quiz.trim() === "") ){
        alert("Veuillez saisir une question est un Quiz .");
        return false;
    }
    // You can add more validation rules here if needed

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
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">

                <form action="" method="POST" onsubmit="return validateForm()">
                    <table class="table" border="1" align="center">
                       <!-- <tr>
                            <td>
                                <label for="id_quest">ID Question:
                                </label>
                            </td>
                            <td><input type="text" name="id_quest" id="id_quest" maxlength="20"></td>
                        </tr>-->
                        <tr>
                            <td>
                                <label for="question">question:
                                </label>
                            </td>
                            <td><input type="text" name="question" id="question" maxlength="20"></td>
                        </tr>
                        <tr>
                            <td>ID Quiz:</td>
                            <td>
                                <select name="id_quiz">
                                    <?php foreach ($qqq as $quiz): ?>
                                        <option value="<?= $quiz['id_quiz'] ?>">
                                            <?= $quiz['id_quiz'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>

                        <td></td>
                        <td>
                            <input type="submit" value="Envoyer">
                        </td>
                        <td>
                            <input type="reset" value="Annuler">
                        </td>
                        </tr>
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
    <?php
    /* if(isset($list))
     {
         ?>
         <br> <h2> Question corresponadt au Quiz selectionne : </h2>
         <ul>
             <?php foreach($list as $Question)
             {
                 ?>
                 <li> <?= $Question['question']?> </li>
                 <?php 
             }
             ?>
         </ul>
         <?php 
     }*/
    ?>
</body>

</html>