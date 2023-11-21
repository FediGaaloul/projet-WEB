<?php
    include_once '../Model/Quiz.php';
    include_once '../Controller/QuizC.php';

    $error = "";

    // create Quiz
    $Quiz = null;

    // create an instance of the controller
    $QuizC = new QuizC();
    if (
        isset($_POST["id_quiz"]) &&
		isset($_POST["titre"]) 
    ) {
        if (
            !empty($_POST["id_quiz"]) && 
			!empty($_POST['titre']) 
        ) {
            $Quiz = new Quiz(
                $_POST['id_quiz'],
				$_POST['titre']
            );
            $QuizC->ajouterQuiz($Quiz);
            header('Location:afficherListeQuiz.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ajouter un  Quiz</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
        function validateForm() {
            var idQuiz = document.getElementById("id_quiz").value;
            var titre = document.getElementById("titre").value;

            if (idQuiz == "" || titre == "") {
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
  <h2>Ajouter un  Quiz </h2>
</header>

<section>
  <nav>
   <ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item"><a class="nav-link" href="ajouterQuiz.php">Ajouter un Quiz</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherListeQuiz.php">Retour a la liste des Quiz</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherlisteQuiz.php">Liste des Quizs</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                    
                </ul>
            </ul>
  </nav>
  <article>
   <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST" onsubmit="return validateForm()">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_quiz">ID Quiz:
                        </label>
                    </td>
                    <td><input type="text" name="id_quiz" id="id_quiz" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="titre">titre:
                        </label>
                    </td>
                    <td><input type="text" name="titre" id="titre" maxlength="20"></td>
                </tr>          
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" > 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
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

