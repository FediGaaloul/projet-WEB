<?php
include_once '../Model/resumes.php';
include_once '../Controller/resumeC.php';
include_once '../Controller/coursC.php';

$error = "";

// create cours
$resumes = null;
echo '<pre>';
echo '</pre>';
//print_r($_POST);
// create an instance of the controller
$cC = new coursC();
$qqq = $cC->affichercours();

$resumeC = new resumeC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";
    $qqq = new resumeC();
    if (
        isset($_POST["id_resumes"]) &&
        isset($_POST["id_cours"]) &&
        isset($_POST["Titre_R"]) &&
        isset($_POST["Auteur_etudiant_enseingant"]) &&
        isset($_POST["Date_de_creation"])
    ) {
        if (
            !empty($_POST["id_resumes"]) &&
            !empty($_POST["id_cours"]) &&
            !empty($_POST["Titre_R"]) &&
            !empty($_POST["Auteur_etudiant_enseingant"]) &&
            !empty($_POST["Date_de_creation"])
        ) {
            $resumes = new resumes(
                $_POST['id_resumes'],
                $_POST['id_cours'],
                $_POST['Titre_R'],
                $_POST['Auteur_etudiant_enseingant'],
                $_POST['Date_de_creation']

            );
            $resumeC->ajouterresumes($resumes);
            header('Location:afficherresumes.php');
        } else
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
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
        function validateForm() {
            var id_resumes = document.getElementById('id_resumes').value;
            var id_cours = document.getElementById('id_cours').value;
            var Titre_R = document.getElementById('Titre_R').value;
            var Auteur_etudiant_enseingant = document.getElementById('Auteur_etudiant_enseingant').value;
            var Date_de_creation = document.getElementById('Date_de_creation').value;

            var idRegex = /^\d+$/; // Expression régulière pour les chiffres
            var auteurRegex = /^(etudiant|enseignant)$/i; // Expression régulière pour "etudiant" ou "enseignant"

            if (id_resumes === "" || id_cours === "" || Titre_R === "" || Auteur_etudiant_enseingant === "" || Date_de_creation === "") {
                alert("Tous les champs doivent être remplis");
                return false;
            }

            if (!idRegex.test(id_resumes)) {
                alert("Le champ ID_resumes doit contenir uniquement des chiffres.");
                return false;
            }

            if (!idRegex.test(id_cours)) {
                alert("Le champ id_cours doit contenir uniquement des chiffres.");
                return false;
            }

            if (!auteurRegex.test(Auteur_etudiant_enseingant)) {
                alert("Le champ Auteur doit être 'etudiant' ou 'enseingnant'.");
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
                    <a class="navbar-brand" href="index.html"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
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
            <button><a href="afficherresumes.php">Retour à la liste des resumes</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="ajouterresumes.php" method="POST" onsubmit="return validateForm()">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id_resumes">Numéro resumés:
                    </label>
                </td>
                <td><input type="text" name="id_resumes" id="id_resumes" maxlength="20"></td>
            </tr>
                <td>
                    <label for="Titre_R">Titre_R:
                    </label>
                </td>
                <td><input type="Titre_R" name="Titre_R" id="Titre_R"></td>
            </tr>
            <tr>
                <td>
                    <label for="Auteur_etudiant_enseingant">Auteur_etudiant_enseingant:
                    </label>
                </td>
                <td><input type="text" name="Auteur_etudiant_enseingant" id="Auteur_etudiant_enseingant" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Date_de_creation">Date_de_creation:
                    </label>
                </td>
                <td>
                    <input type="text" name="Date_de_creation" id="Date_de_creation">
                </td>
            </tr>
            <tr>
                <td>ID_Cours:</td>
                <td>
                    <select name="id_cours">
                        <?php foreach ($qqq as $cours): ?>
                            <option value="<?= $cours['ID_Cours'] ?>">
                                <?= $cours['ID_Cours'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
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
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <div class="small m-0 text-white">Copyright &copy; Apprentech2023</div>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    
    </html>