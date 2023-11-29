<?php
session_start();
require_once 'C:\xampp\htdocs\projet0\con_dbb.php';
$total = 0; // Initialisez la variable $total
if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
    if (isset($_GET['del'])) {
        $id_del = $_GET['del'];
        unset($_SESSION['panier'][$id_del]);
    }
} else {
        $_SESSION['panier'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mettez vos balises meta et liens de style ici -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modern Business - Start Bootstrap Template</title>
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
        <br><br>
        <a href="cours.php" class="link">page principale</a>

        <div class="panier">
            <section>
                <br><br>
                <table>
                    <tr>
                        <th></th>
                        <th>nom cours</th>
                        <th>Prix</th>
                        <th>statue</th>
                        <th><center>Action</center></th>
                    </tr>
                    <?php
                     $ids = array_keys($_SESSION['panier'] ?? []);                
                     if(empty($ids)){
                       echo "Votre panier est vide";
                     }else {
                       
                       $cours = mysqli_query($con, "SELECT * FROM cours WHERE id_cours IN (".implode(',', $ids).")");
       
                
                       foreach($courss as $cours):
                        $total = $total + $cours->getPrix() * $_SESSION['panier'][$cours->getIdCours()];
                    ?>
                        <tr>
                            <td><img src="project_images/<?=$cours['img']?>"></td>
                            <td><?=$cours['titre']?></td>
                            <td><?=$cours['description']?></td>
                            <td><?=$cours['prix']?>€</td>
                            <td><?=$_SESSION['panier'][$cours['id_cours']] // Quantité?></td>
                            <td><a href="panier.php?del=<?=$cours['id_cours']?>"><img src="delete.png"></a></td>
                        </tr>

                      <?php endforeach ;} ?>
                        <tr class="total">
                        <th>Total : <?= $total ?></th>
                    </tr>
                </table>
            </section>
        </div>
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
