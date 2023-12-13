<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../BackOffice/login.php"); // Redirect to the login page if not logged in
    exit();
}

require '../../Controller/UserC.php';

// Fetch user data based on the session user ID
$userID = $_SESSION['user_id'];
$userData = UserC::getUserById($userID);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="images\logo.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">Apprentech</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                         <?php echo $userData->getFirstname() . ' ' . $userData->getLastname(); ?>
                                </span>  
                                <img class="img-profile rounded-circle" height = "30" width = "30"
                                    src="../BackOffice/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../BackOffice/login.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="http://localhost/startbootstrap-modern-business-gh-pages/apprentech/views/ajouterresumes.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Resumes</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="http://localhost/startbootstrap-modern-business-gh-pages/apprentech/views/ajouterresumes.php">etudiant</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/startbootstrap-modern-business-gh-pages/apprentech/views/ajouterresumes.php">enseingant</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="http://localhost/startbootstrap-modern-business-gh-pages/apprentech/views/ajouterexamen.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Examens</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="http://localhost/startbootstrap-modern-business-gh-pages/apprentech/views/afficherexamen.php">La liste des Examens</a></li>
                                </ul>
                            </li>
                            <li><div id="google_translate_element"></div></li>
                        </ul>
                    </div>
                    
                </div>
            </nav>
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4"> Rejoindre un cours</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                </div>
                                <img src="images\back.jpg" alt="Description de l'image"style="width: 90%; height: 400px;>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5 bg-light">
                <div class="container px-5">
                    <div class="row gx-5">
                        <div class="col-xl-8">
                            <h2 class="fw-bolder fs-5 mb-4">les Niveaux</h2>
                            <!-- News item-->
                            <div class="mb-4">
                                <div class="small text-muted">pour accéder au cours et résumés:</div>
                                <a class="link-dark" href="#!">
                                    <h3 style="text-decoration: underline; color: black;">1er année</h3>
                                </a>
                            </div>
                            <!-- News item-->
                            <div class="mb-5">
                                <div class="small text-muted">pour accéder au cours et résumés:</div>
                                <a class="link-dark" href="#!">
                                    <h3 style="text-decoration: underline; color: black;">2éme année</h3>
                                </a>
                            </div>
                            <!-- News item-->
                            <div class="mb-5">
                                <div class="small text-muted">pour accéder au cours et résumés:</div>
                                <a class="link-dark" href="#!">
                                    <h3 style="text-decoration: underline; color: black;">3éme année</h3>
                                </a>
                            </div>
                            <div class="mb-5">
                                <div class="small text-muted">pour accéder au cours et résumés:</div>
                                <a class="link-dark" href="#!">
                                    <h3 style="text-decoration: underline; color: black;">4éme année</h3>
                                </a>
                            </div>
                            <div class="mb-5">
                                <div class="small text-muted">pour accéder au cours et résumés:</div>
                                <a class="link-dark" href="#!">
                                    <h3 style="text-decoration: underline; color: black;">5éme année</h3>
                                </a>
                            </div>
                            <div class="text-end mb-5 mb-xl-0">
                                <a class="text-decoration-none" href="http://localhost/startbootstrap-modern-business-gh-pages/apprentech/views/ajoutercours.php">
                                    Ajouter cours
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border-0 h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex h-100 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="h6 fw-bolder">Contact</div>
                                            <p class="text-muted mb-4">
                                                For press inquiries, email us at
                                                <br />
                                                <a href="#!">press@domain.com</a>
                                            </p>
                                            <div class="h6 fw-bolder">Follow us</div>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-twitter"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-facebook"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5">
                    <h2 class="fw-bolder fs-5 mb-4">Les Cours</h2>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="images\math.jpg" alt="..." style="width: 100%; height: 220px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">Mathématique</div></a>
                                    <p class="card-text mb-0"><a href="#!">-Developpement limité.</a></p>
                                    <p class="card-text mb-0"><a href="#!">-Matrices.</a></p>
                                    <p class="card-text mb-0"><a href="#!">-Les suites.</a></p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="images\th.jpg" alt="..."style="width: 50px; height: 50px;" />
                                            <div class="small">
                                                <div class="fw-bold">nom prenom </div>
                                                <div class="text-muted">mois jour, annee &middot; temps</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="images\java-logo.png" alt="..." style="width: 100%; height: 220px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">Java</div></a>
                                    <p class="card-text mb-0"><a href="#!">-Variables, types de données, et opérateurs.</a></p>
                                    <p class="card-text mb-0"><a href="#!">-Fonctions et méthodes.</a></p>
                                    <p class="card-text mb-0"><a href="#!">-Classes et objets.</a></p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="images\th.jpg" alt="..."style="width: 50px; height: 50px;" />
                                            <div class="small">
                                                <div class="fw-bold">non prenom</div>
                                                <div class="text-muted">Mois jour, annee &middot; temps</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="images\c++.png" alt="..." style="width: 100%; height: 220px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">C++</div></a>
                                    <p class="card-text mb-0"><a href="#!">-Variables, types de données, et opérateurs.</a></p>
                                    <p class="card-text mb-0"><a href="#!">-Fonctions et méthodes.</a></p>
                                    <p class="card-text mb-0"><a href="#!">-Classes et objets.</a></p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="images\th.jpg" alt="..."style="width: 50px; height: 50px;" />
                                            <div class="small"> 
                                            <div class="small">
                                                <div class="fw-bold">nom prenom</div>
                                                <div class="text-muted">Mois jour, annee &middot; temps</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </section>            
                        <section class="py-5">
                            <div class="container px-5">
                                <h2 class="fw-bolder fs-5 mb-4">Les Certificats</h2>
                                <div class="row gx-5">
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="images\cert1.png" alt="..."style="width: 90%; height: 220px;"/>
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">Les Certificats pour les Niveaux A</div></a>
                                                <p class="card-text mb-0">Pour prendre cette certificats il doit passer par l'examen de niveau "A1" et "A2".</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center"> 
                                                        <button onclick="redirigerVersAutreFenetre()"> 
                                                        <img class="rounded-circle me-3" src="images\start.png" alt="..."style="width: 50px; height: 50px;" />
                                                        </button>
                                                        <div class="small">
                                                            <div class="fw-bold">Prix:250DT</div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function redirigerVersAutreFenetre() {
                                                            // Redirection vers une autre fenêtre ou page ici
                                                            window.location.href = 'chemin_vers_votre_autre_fenetre.html';
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="images\cert2.jpg" alt="..."style="width: 100%; height: 220px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">Les Certificats pour les Niveaux B </div></a>
                                    <p class="card-text mb-0">Pour prendre cette certificats il doit passer par l'examen de niveau "B1" et "B2".</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <button onclick="redirigerVersAutreFenetre()"> 
                                                <img class="rounded-circle me-3" src="images\start.png" alt="..."style="width: 50px; height: 50px;" />
                                                </button>
                                            <div class="small">
                                                <div class="fw-bold">Prix:250DT</div>
                                            </div>
                                        </div>
                                        <script>
                                            function redirigerVersAutreFenetre() {
                                                // Redirection vers une autre fenêtre ou page ici
                                                window.location.href = 'chemin_vers_votre_autre_fenetre.html';
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="images\cert3.jpg" alt="..." style="width: 100%; height: 220px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><div class="h5 card-title mb-3">Les Certificats pour les Niveaux C</div></a>
                                    <p class="card-text mb-0">Pour prendre cette certificats il doit passer par l'examen de niveau "C1" et "C2".s</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <button onclick="redirigerVersAutreFenetre()"> 
                                                <img class="rounded-circle me-3" src="images\start.png" alt="..."style="width: 50px; height: 50px;" />
                                                </button>
                                            <div class="small">
                                                <div class="fw-bold">Prix:250DT</div>

                                            </div>
                                        </div>
                                        <script>
                                            function redirigerVersAutreFenetre() {
                                                // Redirection vers une autre fenêtre ou page ici
                                                window.location.href = 'chemin_vers_votre_autre_fenetre.html';
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mb-5 mb-xl-0">
                        <a class="text-decoration-none" href="#!">
                            suivant
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Apprentech 2023</div></div>
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
           // Fonction pour déclencher la recherche
            function rechercher() {
            var term = document.getElementById('searchTerm').value;
             // Effectuer une requête AJAX vers votre point d'API
             $.ajax({
             url: 'rechercher_api.php',
             type: 'GET',
             data: { term: term },
             success: function (data) {
                // Gérer les résultats de la recherche
                var result = JSON.parse(data);
                // Manipuler les résultats, par exemple, les afficher dans une liste
                console.log(result);
            },
            error: function () {
                console.log('Erreur lors de la recherche.');
            }
            });
                }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
            </script>
            <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/656f8574bfb79148e59a6a34/1hgtq2l42';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
    </body>
</html>
