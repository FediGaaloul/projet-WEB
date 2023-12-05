<?php
include_once '../Controller/QuizC.php';
include_once '../Controller/QuestionC.php';
include_once '../Controller/Question_optC.php';
$q1 = new question_optC();
$listequestion1 = $q1->afficherQuestion_opt_et($_GET["id_quest"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>liste des quiz </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
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
                        <li class="nav-item"><a class="nav-link" href="">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <table class="table" border="1" align="center">
                    <thead>
                        <tr>
                            <th>question</th>
                            <th>reponse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listequestion1 as $Question_opt):
                            ?>
                            <tr class="col-sm-3 col-md-6 col-lg-4">
                                <td>
                                    <?php echo $Question_opt['opt']; ?>
                                </td>
                            <tr>
                                <td>
                                    <label for="reponse">ID Quiz:
                                    </label>
                                </td>
                                <td><input type="text" name="id_quiz" id="id_quiz" maxlength="20"></td>
                            </tr>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                    <td>
                    <form method=""action="ListeQuizEtudient.php">
                                    <input type="submit" name="envoyer" value="envoyer">
                                    <input type="hidden" >
                                </form>                            </td>
                </table>
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