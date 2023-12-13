<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);//verfier les erreurs
include_once '../../Controller/payementc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nom_carte"]) &&
        isset($_POST["n_carte"]) &&
        isset($_POST["d_expiration"]) &&
        isset($_POST["cryptogramme"])
    ) {
            $payment = new Payment(
                null, 
                $_POST["nom_carte"],
                $_POST["n_carte"],
                $_POST["d_expiration"],
                $_POST["cryptogramme"]
            );
            $paymentC = new PayementC;
            $paymentC->ajouterpayement($payment);
            //header('Location:afficherpayement.php');
            exit; 
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
        <title>Ajouter paiement</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo.png" />
        <!-- Bootstrap icons-->
        <link href="logo.png" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="paiement.js"></script>
        <!-- Inclure les fichiers CSS et JS de SweetAlert2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
       <!-- Ajoutez ce code dans votre fichier HTML -->
              <script>
                // Fonction pour afficher une notification de succès
                function afficherNotificationSucces(message) {
                  Swal.fire({
                    icon: 'success',
                    
                    title: 'Succès',
                    text: message,
                  });
                }

                // Fonction pour afficher une notification d'erreur
                function afficherNotificationErreur(message) {
                  Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: message,
                  });
                }
              </script>

      
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
                          <li class="nav-item"><a class="nav-link" href="paiement.php">Paiement</a></li>
                        <li class="nav-item"><a class="nav-link" href="ajoutertransaction.php">Transaction </a></li>
                        <li class="nav-item"><a class="nav-link" href="afficherpayement.php">afficher Liste Payments </a></li>
                          <li class="nav-item dropdown">
                      </ul>
                  </div>
              </div>
          </nav>
                  <div class="container">
                <div class="row">
                  <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                      <div class="card-img-left d-none d-md-flex">
                      <img src="im1.jpg.png" class="card-image"> 
                      
                      </div>
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Paiement en ligne</h5>
                        <form action="payé.php" method="POST" onsubmit="validateForm() ">
                          <table>
                          <tr>
                          <div class="form-floating mb-3">
                            <td><label for="nom_carte">Nom sur la carte</label></td>
                          <td><input type="text" class="form-control" id="c" placeholder="nom_carte" name="nom_carte"></td>
                            
                          </div></tr>
            
                        <tr><div class="form-floating mb-3">
                           <td><label for="n_carte">N° carte</label></td>
                          <td><input type="password" class="form-control" id="n_carte" placeholder="**** **** **** ****" name="n_carte">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAUFJREFUSEvt1dFNxEAMBFBfJ1AJUAlQCVAJXCVAJdAJ6Ek7yHe6C19J7iMrRdns2h7P2LvZ1UpjtxJubcCLKb9JvUk9mwIX0Vy3VeW5GTQ/q+p5zK0/VZW176q6H3P7V1X10Pz2VfV25Ofzrst3ijGQ9wFwPYy/BgBnoIAehw1bQ0J57Bk/DYzvR75PAWMAyLAP5HU4cU4SkrJHCQEPGDU/yYj5LzBALDA/ZkjCsJBUTxIAe2+jqyTeSyvd2Z+E2mHC2DvsAyR4ymCNIhK1TuasSVQMSRyocq6rOxOgAggY2fPd+yUM2emDJMJGvJ7s5G8xgThix7ErgQGmqWGCA05zppkkcVDnqXMsKON+rHJsHBmAysDGYEeJ2JA4wNao8HfULuIC6fWafb4xnl3iqStzEfCtxovInIt/MbAOtFqNfwG4uU4fCWy6bQAAAABJRU5ErkJggg=="/>
                          </td>
                          </div></tr>
            
                          <hr>
            
                        <tr><div class="form-floating mb-3">
                            <td><label for="d_expiration">Date d'expiration</label></td>
                            <td><input type="date" class="form-control" id="d_expiration" placeholder="MM/AA" name="d_expiration"></td>
                            
                          </div></tr>
            
                        <tr> <div class="form-floating mb-3">
                          <td><label for="Cryptogramme">Cryptogramme visuel</label></td>
                            <td><input type="password" class="form-control" id="Cryptogramme" placeholder="Confirm Password" name="cryptogramme"></td>
                          </div></tr>
                        <tr><td></td>
                          <td><br>
                           <div class="d-grid mb-2">
                              <div class="g-recaptcha" data-sitekey="6LeAkOgUAAAAACcy3uY6N9H9SJMS27n3Zx2OOnYK"
                                data-action="account_login" data-callback="onSuccess"></div>
                           <!--<a href="" class="cours_list">ajouter au Panier</a>!-->
                          <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Payer</button></td></centre>
                          </div></tr>
            
                          <!--<a class="d-block text-center mt-2 small" href="#">Have an account? Sign In</a>!-->
            
                          <hr class="my-4">
                        </table>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>