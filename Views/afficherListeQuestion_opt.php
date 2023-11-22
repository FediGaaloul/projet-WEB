<?php
include '../Controller/Question_optC.php';
$q = new Question_optC();
$listeQuestion_opt = $q->afficherQuestion_opt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Liste des options Question</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
  <h2>Liste des options Question </h2>
</header>

<section>
  <nav>
   <ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item"><a class="nav-link" href="ajouterQuestion_opt.php">Ajouter un Question_opt</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="afficherlisteQuestion_opt.php">Liste des Question_opts</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                    
                </ul>
            </ul>
  </nav>
  <article>
            <table border="1" align="center">
                <tr>
                    <th>ID option</th>
                    <th>option</th>
                    <th>ID Question</th>
                    <th>is right</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($listeQuestion_opt as $Question_opt)
                {
                ?>
                <tr>
                    <td><?php echo $Question_opt['id_opt']; ?></td>
                    <td><?php echo $Question_opt['opt']; ?></td>
                    <td><?php echo $Question_opt['id_quest']; ?></td>
                    <td><?php echo $Question_opt['is_right']; ?></td>
                    <td>
                        <form method="POST" action="modifierQuestion_opt.php">
                            <input type="submit" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $Question_opt['id_opt']; ?> name="id_opt">
                        </form>
                    </td>
                    <td>
                        <a href="supprimerQuestion_opt.php?id_opt=<?php echo $Question_opt['id_opt']; ?>">Supprimer</a>
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

