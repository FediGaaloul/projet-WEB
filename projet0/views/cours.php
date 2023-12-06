<?php
include_once 'C:\xampp\htdocs\projet0\con_dbb.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panier</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo.png" />
        <!-- Bootstrap icons-->
        <link href="logo.png" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="#">apprenTech</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="cours.php">Cours</a></li>
                            <li class="nav-item"><a class="nav-link" href="Panier.php"> Panier</a></li>
                            <li class="nav-item"><a class="nav-link" href="paiement.php">Paiement</a></li>
                            <li class="nav-item dropdown">
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <a href="Panier.html"class="link">Panier <span><?=array_sum($_SESSION['panier'])?></span></a>
            <section class="cours_list">
            <?php
                
                //include_once "con_dbb.php";
                //afficher la liste des produits
                 $req = mysqli_query($con, "SELECT * FROM cours");
                 while($row = mysqli_fetch_assoc($req)){ 
                ?>
               <form action="" class="cours">
                <div class="image_cours">
                    <img src="assets/Capture d'écran 2023-11-19 224736.jpg" alt="cours HTML">
                </div>
                <div class="detail">
                    <h4 class="nom_cours"><?= $row['titre'] ?></h4>
                    <h6 class="script"><?= $row['description'] ?></h6>
                    <h2 class="prix"><?= $row['prix'] ?>€</h2> 
                    <a href="ajouter_panier.php?id_cours=<?= $row['id_cours'] ?>" class="cours_list">Ajouter au panier</a>
                </div>
               </form>
               <form action="" class="cours">
                <div class="image_cours">
                    <img src="assets/m3.png" alt="cours java-script">
                </div>
                <div class="detail">
                    <h4 class="nom_cours">Aprender les basse de JS</h4>
                    <h6 class="script">Dans ce cours, vous allez commencer <br>par apprendre à écrire en langage js !</h6>
                    <h2 class="prix">60DT</h2> 
                    <a href="a" class="price">ajouter au Panier</a>
                </div>
               </form>
               <form action="" class="cours">
                <div class="image_cours">
                    <img src="assets/m2.jpg" alt="cours PHP">
                </div>
                <div class="detail">
                    <h4 class="nom_cours">Aprender les basse de PHP</h4>
                    <h6 class="script">Dans ce cours, vous allez commencer <br>par apprendre à écrire en langage PHP !</h6>
                    <h2 class="prix">80DT</h2> 
                    <a href="" class="cours_list">ajouter au Panier</a>
                </div>
               </form>               

                </div>
                <?php } ?>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
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
    </body>
</html>
