<?php
include '../Controller/QuizC.php';
$q = new QuizC();
$listeQuiz = $q->afficherQuiz();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Liste des Quiz</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
  <h2>Liste des Quiz </h2>
</header>

<section>
  <nav>
   <ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item"><a class="nav-link" href="ajouterQuiz.php">Ajouter un Quiz</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherlisteQuiz.php">Liste des Quizs</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                    
                </ul>
            </ul>
  </nav>
  <article>
            <table class ="table" border="1" align="center">
                <tr>
                    <th>id_quiz</th>
                    <th>titre</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($listeQuiz as $Quiz)
                {
                ?>
                <tr>
                    <td><?php echo $Quiz['id_quiz']; ?></td>
                    <td><?php echo $Quiz['titre']; ?></td>
                    <td>
                        <form method="POST" action="modifierQuiz.php">
                            <input type="submit" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $Quiz['id_quiz']; ?> name="id_quiz">
                        </form>
                    </td>
                    <td>
                        <a href="supprimerQuiz.php?id_quiz=<?php echo $Quiz['id_quiz']; ?>">Supprimer</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
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

