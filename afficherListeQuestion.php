<?php
include '../Controller/QuestionC.php';
$q = new questionsC();
$listequestion = $q->afficherQuestions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Liste des question</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
  <h2>Liste des question </h2>
</header>

<section>
  <nav>
   <ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item"><a class="nav-link" href="ajouterquestion.php">Ajouter un question</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherlistequestion.php">Liste des questions</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                    
                </ul>
            </ul>
  </nav>
  <article>
            <table border="1" align="center">
                <tr>
                    <th>ID Question</th>
                    <th>question</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($listequestion as $question)
                {
                ?>
                <tr>
                    <td><?php echo $question['id_quest']; ?></td>
                    <td><?php echo $question['question']; ?></td>
                    <td>
                        <form method="POST" action="modifierquestion.php">
                            <input type="submit" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $question['id_quest']; ?> name="id_quest">
                        </form>
                    </td>
                    <td>
                        <a href="supprimerquestion.php?id_quest=<?php echo $question['id_quest']; ?>">Supprimer</a>
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

