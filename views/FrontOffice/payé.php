<?php
include_once '../../config.php';
include_once '../../Controller/payementc.php';
$p = new payementC();
$listePayments = $p->afficherpayements();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mettez vos balises meta et liens de style ici -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="logo.png" />
    <!-- Bootstrap icons-->
    <link href="logo.png" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
  .success-message {
    background-color: #4caf50;
    color: #fff;
    padding: 20px;
    border-radius: 2px;
    text-align: center;
    width: 600px; /* Adjust the width as needed */
    height: 200px; /* Adjust the height as needed */
    margin: auto; /* Center the element horizontally */
    margin-top: 20vh; /* Add some top margin for better visibility */
  }
</style>

</head>
<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">apprenTech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="cours.php"></a></li>
                        <li class="nav-item"><a class="nav-link" href="afficherpayement.php">afficher Liste Payments </a></li>
                        <li class="nav-item dropdown">
                    </ul>
                </div>
            </div>
        </nav>
        <br><br>
              <div class="success-message">
          <h2>Payment Successful</h2>
       
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
</body>
</html>