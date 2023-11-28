<?php
    include_once '../Model/examen.php';
    include_once '../Controller/examenC.php';
    include_once '../Controller/coursC.php';

    $error = "";

    // create cours
    $examen = null;
    echo '<pre>';
    echo '</pre>';
    //print_r($_POST);
    // create an instance of the controller
    $cC = new coursC();
    $qqq = $cC->affichercours();
    $examenC = new examenC();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = "";
        $qqq = new examenC();
    if (
        isset($_POST["id_examen"]) &&
		isset($_POST["ID_Cours"]) &&		
        isset($_POST["Date_examen"]) &&
		isset($_POST["duree"]) 
    ) {
        if (
            !empty($_POST["id_examen"]) && 
			!empty($_POST["ID_Cours"]) &&
            !empty($_POST["Date_examen"]) && 
			!empty($_POST["duree"]) 
        ) {
            $examen = new examen(
                $_POST['id_examen'],
				$_POST['ID_Cours'],
                $_POST['Date_examen'], 
				$_POST['duree']
                
            );
            $examenC->ajouterexamen($examen);
             header('Location:afficherexamen.php');
        }
        else
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
        var id_examen = document.getElementById('id_examen').value;
        var ID_Cours = document.getElementById('ID_Cours').value;
        var Date_examen = document.getElementById('Date_examen').value;
        var duree = document.getElementById('duree').value;

        var idRegex = /^\d+$/; // Expression régulière pour les chiffres
        var timeRegex = /^\d{1,2}:\d{1,2}$/; // Expression régulière pour le format heure:minute

        if (id_examen === "" || ID_Cours === "" || Date_examen === "" || duree === "") {
            alert("Tous les champs doivent être remplis");
            return false;
        }

        if (!idRegex.test(id_examen) || !idRegex.test(ID_Cours)) {
            alert("Les champs ID_examen et ID_Cours doivent contenir uniquement des chiffres.");
            return false;
        }

        if (!timeRegex.test(duree)) {
            alert("Le champ Durée doit être au format HH:MM.");
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
            <button><a href="afficherexamen.php">Retour à la liste des examens</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST" onsubmit="return validateForm()">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_examen">Numéro de l'examen:
                        </label>
                    </td>
                    <td><input type="text" name="id_examen" id="id_examen" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Date_examen">Date de l'examen:
                        </label>
                    </td>
                    <td><input type="text" name="Date_examen" id="Date_examen" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="duree">Durée de l'examen:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="duree" id="duree">
                    </td>
                </tr>
                <tr>
                <td>ID_Cours:</td>
                <td>
                    <select name="ID_Cours">
                        <?php foreach ($qqq as $cours): ?>
                            <option value="<?= $cours['ID_Cours'] ?>">
                                <?= $cours['ID_Cours'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
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