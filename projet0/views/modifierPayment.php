<?php
require_once '..\config.php';
require_once '..\controllor\payementc.php';

$error = "";

// create Payment
$payment = null;

// create an instance of the controller
$payementC = new payementC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom_carte"]) &&
    isset($_POST["n_carte"]) &&
    isset($_POST["d_expiration"]) &&
    isset($_POST["cryptogramme"]) &&
    isset($_POST["id_user"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['nom_carte']) &&
        !empty($_POST["n_carte"]) &&
        !empty($_POST["d_expiration"]) &&
        !empty($_POST["cryptogramme"]) &&
        !empty($_POST["id_user"])
    ) {
        $payment = new Payment(
            $_POST['id'],
            $_POST['nom_carte'],
            $_POST['n_carte'],
            $_POST['d_expiration'],
            $_POST['cryptogramme'],
            $_POST['id_user']
        );
        $payementC->modifierpayement($payment, $_POST["id"]);
        header('Location:afficherpayement.php');
    } else {
        $error = "Informations manquantes";
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
        <link rel="icon" type="image/x-icon" href="logo.png" />
        <!-- Bootstrap icons-->
        <link href="logo.png" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
          function validateForm() {
              var nomCarte = document.getElementById('nom_carte').value;
              var numCarte = document.getElementById('n_carte').value;
              var dateExpiration = document.getElementById('d_expiration').value;
              var cryptogramme = document.getElementById('Cryptogramme').value;
      
              if (nomCarte.trim() === '') {
                  alert('Veuillez saisir le nom sur la carte.');
                  return false;
              }
      
              if (numCarte.length !== 16 || isNaN(numCarte)) {
                  alert('Veuillez saisir un numéro de carte valide.');
                  return false;
              }
      
              var currentDate = new Date();
              var currentYear = currentDate.getFullYear();
              var currentMonth = currentDate.getMonth() + 1;
      
              var inputYear = parseInt(dateExpiration.substring(2));
              var inputMonth = parseInt(dateExpiration.substring(0, 2));
      
              //if (dateExpiration.length !== 4 || isNaN(dateExpiration) || inputMonth > 12 || inputMonth < currentMonth || (inputYear < currentYear % 100 || (inputYear === currentYear % 100 && inputMonth < currentMonth))) {
                 // alert('Veuillez saisir une date d\'expiration valide mm/aa.');
                  //return false;
             //
             }
      
              if (cryptogramme.trim() === '' || isNaN(cryptogramme) || cryptogramme.length !== 3) {
                  alert('Veuillez saisir un cryptogramme visuel valide.');
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
                  <a class="navbar-brand" href="#">apprenTech</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                          <li class="nav-item"><a class="nav-link" href="cours.php">Cours</a></li>
                          <li class="nav-item"><a class="nav-link" href="Panier.php"> Panier</a></li>
                          <li class="nav-item"><a class="nav-link" href="paiement.php">Paiement</a></li>
                        <li class="nav-item"><a class="nav-link" href="afficherpayement.php">afficher Liste Payments </a></li>
                          <li class="nav-item dropdown">
                      </ul>
                  </div>
              </div>
          </nav>

    <header>
        <h2>Modifier le paiement</h2>
    </header>

    <section>
        <button><a href="afficherpayement.php">Retour à la liste des paiements</a></button>
        <article>
            <div id="error">
                <?php echo $error; ?>
            </div>

           <!-- <?php
           // if (isset($_POST['id'])) {
              //  $payment = $payementC->recupererPayment($_POST['id']);

                ?>

                <form action="" method="POST" onsubmit="return validateForm()">
                    <table border="1" align="center">
                        <tr>
                            <td>
                                <label for="id">ID :
                                </label>
                            </td>
                            <td><input type="text" name="id" id="id" value="<?php// echo $payment['id']; ?>" maxlength="20">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nom_carte">Nom de la carte :
                                </label>
                            </td>
                            <td><input type="text" name="nom_carte" id="nom_carte" value="<?php// echo $payment['nom_carte']; ?>"
                                    maxlength="20"></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="n_carte">Numéro de la carte :
                                </label>
                            </td>
                            <td><input type="text" name="n_carte" id="n_carte" value="<?php// echo $payment['n_carte']; ?>"
                                    maxlength="20"></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="d_expiration">Date d'expiration :
                                </label>
                            </td>
                            <td><input type="text" name="d_expiration" id="d_expiration"
                                    value="<?php// echo $payment['d_expiration']; ?>" maxlength="20"></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cryptogramme">Cryptogramme :
                                </label>
                            </td>
                            <td>
                                <input type="text" name="cryptogramme" id="cryptogramme"
                                    value="<?php //echo $payment['cryptogramme']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="id_user">ID Utilisateur :
                                </label>
                            </td>
                            <td>
                                <input type="text" name="id_user" id="id_user" value="<?php //echo $payment['id_user']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Modifier">
                            </td>
                            <td>
                                <input type="reset" value="Annuler">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
           // }
            ?>-->
        </article>
    </section>
    <div class="container">
                <div class="row">
                  <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                      <div class="card-img-left d-none d-md-flex">
                        <img src="im1.jpg" class="card-image"> 
                      
                      </div>
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Paiement en ligne</h5>
                        <form action="#" method="get" onsubmit="validateForm() ">
                          <table>
                          <tr>
                          <div class="form-floating mb-3">
                            <td><label for="nom_carte">Nom de la carte</label></td>
                          <td><input type="text" class="form-control" id="nom_carte" placeholder="nom_carte"value="<?php echo $payment['nom_carte']; ?>"></td>
                            
                          </div></tr>
            
                        <tr><div class="form-floating mb-3">
                           <td><label for="n_carte">N° carte</label></td>
                          <td><input type="password" class="form-control" id="n_carte" placeholder="**** **** **** ****" value="<?php echo $payment['n_carte']; ?>">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAUFJREFUSEvt1dFNxEAMBFBfJ1AJUAlQCVAJXCVAJdAJ6Ek7yHe6C19J7iMrRdns2h7P2LvZ1UpjtxJubcCLKb9JvUk9mwIX0Vy3VeW5GTQ/q+p5zK0/VZW176q6H3P7V1X10Pz2VfV25Ofzrst3ijGQ9wFwPYy/BgBnoIAehw1bQ0J57Bk/DYzvR75PAWMAyLAP5HU4cU4SkrJHCQEPGDU/yYj5LzBALDA/ZkjCsJBUTxIAe2+jqyTeSyvd2Z+E2mHC2DvsAyR4ymCNIhK1TuasSVQMSRyocq6rOxOgAggY2fPd+yUM2emDJMJGvJ7s5G8xgThix7ErgQGmqWGCA05zppkkcVDnqXMsKON+rHJsHBmAysDGYEeJ2JA4wNao8HfULuIC6fWafb4xnl3iqStzEfCtxovInIt/MbAOtFqNfwG4uU4fCWy6bQAAAABJRU5ErkJggg=="/>
                          </td>
                          </div></tr>
            
                          <hr>
            
                        <tr><div class="form-floating mb-3">
                            <td><label for="d_expiration">Date d'expiration</label></td>
                            <td><input type="password" class="form-control" id="d_expiration" placeholder="MM/AA"value="<?php echo $payment['d_expiration']; ?>"></td>
                            
                          </div></tr>
            
                        <tr> <div class="form-floating mb-3">
                          <td><label for="Cryptogramme">Cryptogramme visuel</label></td>
                            <td><input type="password" class="form-control" id="Cryptogramme" placeholder="Confirm Password" value="<?php echo $payment['cryptogramme']; ?>"></td>
                          </div></tr>
                          <div class="form-floating mb-3">
                            <td><label for="nom_carte">id_utilisateur</label></td>
                          <td><input type="text" class="form-control"  placeholder="id_user"  id="id_user" value="<?php echo $payment['id_user']; ?>"></td>
                            
                          </div></tr>
            
                        <tr><td></td>
                          <td><br>
                           <div class="d-grid mb-2">
                           <!--<a href="" class="cours_list">ajouter au Panier</a>
                          <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Payer</button></td></centre>!-->
                          <td></td>
                          <tr>
                            <td>
                                <input type="submit" value="Modifier">
                                </td>
                                <td>
                                <input type="reset" value="Annuler">
                            </td>
                          </tr>
                        </tr>
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
