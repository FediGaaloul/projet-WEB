<?php
    include_once '../../Model/cours.php';
    include_once '../../Controller/coursC.php';

    $error = "";

    // create cours
    $cours = null;
    echo '<pre>';
    echo '</pre>';
    //print_r($_POST);
    // create an instance of the controller
    $coursC = new coursC();
    if (
        isset($_POST["ID_Cours"]) &&
		isset($_POST["Titre_C"]) &&		
        isset($_POST["Date_D_C"]) &&
		isset($_POST["Date_F_C"]) && 
        isset($_POST["Niv_Diff"])&& 
        isset($_POST["Categories"])&&
        isset($_POST["ID_utlisateur"])&&
        isset($_POST["Status"])&&
        isset($_POST["prix"])

    ) {
        if (
            !empty($_POST["ID_Cours"]) && 
			!empty($_POST["Titre_C"]) &&
            !empty($_POST["Date_D_C"]) && 
			!empty($_POST["Date_F_C"]) && 
            !empty($_POST["Niv_Diff"])&&
            !empty($_POST["Categories"])&&
            !empty($_POST["ID_utlisateur"])&&
            !empty($_POST["Status"])&&
            !empty($_POST["prix"])
        ) {
            $cours = new cours(
                $_POST['ID_Cours'],
				$_POST['Titre_C'],
                $_POST['Date_D_C'], 
				$_POST['Date_F_C'],
                $_POST['Niv_Diff'],
                $_POST['Categories'],
                $_POST['ID_utlisateur'],
                $_POST['Status'],
                $_POST['prix'],
                
            );
            $coursC->ajoutercours($cours);
             header('Location:affichercours.php');
        }
        else
            $error = "Missing information";
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
        <link rel="icon" type="../image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
        <script>
        function validateForm() {
            var ID_Cours = document.getElementById('ID_Cours').value;
            var ID_utlisateur = document.getElementById('ID_utlisateur').value;
            var Status = document.getElementById('Status').value;
    
            var idRegex = /^\d+$/; // Expression régulière pour les chiffres
            var statusRegex = /^(payant|gratuit)$/i; // Expression régulière pour "payant" ou "gratuit"
    
            if (!idRegex.test(ID_Cours)) {
                alert("Le champ ID_Cours doit contenir uniquement des chiffres.");
                return false;
            }
    
            if (!idRegex.test(ID_utlisateur)) {
                alert("Le champ ID_utlisateur doit contenir uniquement des chiffres.");
                return false;
            }
    
            if (!statusRegex.test(Status)) {
                alert("Le champ Status doit être 'payant' ou 'gratuit'.");
                return false;
            }
    
            var Titre_C = document.getElementById('Titre_C').value;
            var Date_D_C = document.getElementById('Date_D_C').value;
            var Date_F_C = document.getElementById('Date_F_C').value;
            var Niv_Diff = document.getElementById('Niv_Diff').value;
            var Categories = document.getElementById('Categories').value;
            var Categories = document.getElementById('prix').value;
    
            if (
                ID_Cours == "" || 
                Titre_C == "" || 
                Date_D_C == "" || 
                Date_F_C == "" || 
                Niv_Diff == "" ||
                Categories == "" ||
                ID_utlisateur == "" ||
                Status == "" ||
                prix == ""
            ) {
                alert("Tous les champs doivent être remplis");
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
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
l>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <section class="py-5">
            <button><a href="affichercours.php">Retour à la liste des courss</a></button>
            <hr>
            
            <div id="error">
                <?php echo $error; ?>
            </div>
            
            <form action="" method="POST" onsubmit="return validateForm()">
                   <table border="1" align="center" id="coursesTable">
                    <tr>
                        <td>
                            <label for="ID_Cours">Numéro cours:
                            </label>
                        </td>
                        <td><input type="text" name="ID_Cours" id="ID_Cours" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Titre_C">Titre_C:
                            </label>
                        </td>
                        <td><input type="Titre_C" name="Titre_C" id="Titre_C" ></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Date_D_C">Date_D_C:
                            </label>
                        </td>
                        <td><input type="text" name="Date_D_C" id="Date_D_C" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Date_F_C">Date_F_C:
                            </label>
                        </td>
                        <td>
                            <input type="text" name="Date_F_C" id="Date_F_C">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Niv_Diff">Niv_Diff:
                            </label>
                        </td>
                        <td>
                            <input type="Niv_Diff" name="Niv_Diff" id="Niv_Diff">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Categories">Categories:
                            </label>
                        </td>
                        <td>
                            <input type="Categories" name="Categories" id="Categories">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID_utlisateur">ID_utlisateur:
                            </label>
                        </td>
                        <td>
                            <input type="ID_utlisateur" name="ID_utlisateur" id="ID_utlisateur">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Status">Status:
                            </label>
                        </td>
                        <td>
                            <input type="Status" name="Status" id="Status">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="prix">prix:
                            </label>
                        </td>
                        <td>
                            <input type="prix" name="prix" id="prix">
                        </td>
                    </tr>
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
        <script src="../js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    
    </html>