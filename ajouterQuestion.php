<?php
    include  '../Model/Questions.php';
    include '../Controller/QuestionC.php';
    include __DIR__ .'../Controller/QuizC.php';
    $error = "";
    /*$qc=new QuizC();
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        if(isset($_POST['id_quiz']) && isset($_POST['search']))
        {
            $id_quiz=$_POST['id_quiz'];
            $list=$qc->afficherQuestion($id_quest);
        }
    }
    $$qq=$QuizC->afficherQuiz();*/
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
            $QuestionC->ajouterQuestions($Question);
            header('Location:afficherListeQuestion.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ajouter un  Question</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
        function validateForm() {
            var idQuest = document.getElementById("id_quest").value;
            var question = document.getElementById("question").value;

            if (idQuest == "" || question == "") {
                alert("Veuillez remplir tous les champs");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<header>
  <h2>Ajouter un  Question </h2>
</header>

<section>
  <nav>
   <ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item"><a class="nav-link" href="ajouterQuestion.php">Ajouter un Question</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherListeQuestion.php">Retour a la liste des Question</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherlisteQuestion.php">Liste des Questions</a></li>
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
                        <label for="id_quest">ID Question:
                        </label>
                    </td>
                    <td><input type="text" name="id_quest" id="id_quest" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="question">question:
                        </label>
                    </td>
                    <td><input type="text" name="question" id="question" maxlength="20"></td>
                </tr>  
                <tr>
            <!--      <td>
                        <label for="id_quest"> ID Question:
                        </label>
                    </td>
                    <td><selct name="id_quest" id="id_quest"></td>
                    <?php
                    /*foreach($qq as $Quiz)
                    {
                        echo '<option value="'.$Quiz['id_quiz'] .'">'.$Quiz['title'].'</option>';
                    }*/
                    ?>
                    </select>
                </tr>   -->     
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
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
                    <div class="small m-0 text-white">Copyright &copy; APPRENTECH </div>
                </div>
                <div class="col-auto">
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

