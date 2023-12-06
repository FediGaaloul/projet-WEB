<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../controllor/payementc.php';
include_once '../controllor/transactionc.php';
include_once '../controllor/Utilisateurc.php';
include_once '../controllor/coursC.php';

$ut = new UtilisateurC();
$qqq = $ut->afficherUtilisateurs();

$carte = new PayementC();
$aaa = $carte->afficherpayements();

$cours = new coursC();
$ccc = $cours->affichercours();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["id_cours"]) &&
        isset($_POST["id_user"]) &&
        isset($_POST["id_carte"]) &&
        isset($_POST["montant"]) &&
        isset($_POST["date_transaction"])
    ) {
        $transaction = new Transaction(
            null,
            $_POST["id_cours"],
            $_POST["id_user"],
            $_POST["id_carte"],
            $_POST["montant"],
            $_POST["date_transaction"]
        );

        $transactionC = new TransactionC;
        $transactionC->ajouterTransaction($transaction);
        header('Location: affichertransaction.php');
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
        <title>Ajouter transaction</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo.png" />
        <!-- Bootstrap icons-->
        <link href="logo.png" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="paiement.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.js"></script>
        <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdKpicpAAAAAEScaJHcKRXPAhp-VnhxWHkkL54t"></script>
        <style>
            #captchaImage {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            }
    
        </style>
        <script>
        function validateForm() {
            
            var idCours = document.getElementById('id_cours').value;
            var idUser = document.getElementById('id_user').value;
            var idTransaction = document.getElementById('id_transaction').value;
            var montant = document.getElementById('montant').value;
            var dateTransaction = document.getElementById('date_transaction').value;
            

            if (idCours === '' || idUser === '' || idTransaction === '' || montant === '' || dateTransaction === '' || captcha === '') {
                alert('Veuillez remplir tous les champs.');
                return false;
            }
            if (!isValidDate(dateTransaction)) {
                alert('Veuillez entrer une date valide.');
                return false;
            }
        }  
        function isValidDate(dateTransaction) {
                    var regex = /^\d{4}-\d{2}-\d{2}$/;
                    if (!regex.test(dateString)) {
                        return false;
                    }

                    // Convertir la chaîne de date en objet Date
                    var inputDate = new Date(dateTransaction);

                    // Obtenir la date actuelle
                    var currentDate = new Date();

                    // Comparer les dates (ignorer l'heure)
                    return inputDate.getTime() >= currentDate.setHours(0, 0, 0, 0);
                }
                    function onClick(e) {
                e.preventDefault();
                grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6LdKpicpAAAAAEScaJHcKRXPAhp-VnhxWHkkL54t', {action: 'LOGIN'});
                });
            }
            function generateCaptchaText(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captchaText = '';
    for (let i = 0; i < length; i++) {
      captchaText += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return captchaText;
  }

            function generateCaptcha() {
                const captchaText = generateCaptchaText(6); 
                const captchaImage = document.getElementById('captchaImage');
                captchaImage.innerHTML = `<img src="https://via.placeholder.com/200x80/0088cc/ffffff?text=${captchaText}" alt="Captcha Image">`
                window.captchaText = captchaText;
            }
            function checkCaptcha() {
                const userInput = document.getElementById('captchaInput').value;
                if (userInput.toLowerCase() === window.captchaText.toLowerCase()) {
                alert('Captcha verification successful!');
                } else {
                alert('Captcha verification failed. Please try again.');
                }
                generateCaptcha();
            }
            window.onload = generateCaptcha;
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
                        <li class="nav-item"><a class="nav-link" href="ajoutertransaction.php">Transaction </a></li>
                        <li class="nav-item"><a class="nav-link" href="affichertransaction.php">afficher Liste Transaction </a></li>
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
                        <img src="im1.jpg" class="card-image"> 
                      
                      </div>
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Operationde Transaction</h5>
                        <form action="" method="POST" onsubmit="">
                          <table>
                          <tr><div class="form-floating mb-3">
                                <td>ID Cours:</td>
                                <td>
                                    <select name="id_cours">
                                        <?php foreach ($ccc as $cours) : ?>
                                            <option value="<?= $cours['id_cours'] ?>"><?= $cours['id_cours']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                </div></tr>
                            <tr><div class="form-floating mb-3">
                                <td>ID user:</td>
                                <td>
                                    <select name="id_user">
                                        <?php foreach ($qqq as $Utilisateur) : ?>
                                            <option value="<?= $Utilisateur['id_user'] ?>"><?= $Utilisateur['id_user']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                </div></tr>
                            <tr><div class="form-floating mb-3">
                                <td>ID carte:</td>
                                <td>
                                    <select name="id_carte">
                                        <?php foreach ($aaa as $carte) : ?>
                                            <option value="<?= $carte['id'] ?>"><?= $carte['id']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                </div></tr>
                        <tr><div class="form-floating mb-3">
                           <td><label for="montant">Montant</label></td>
                          <td><input type="text" class="form-control" id="montant" placeholder="" name="montant">
                          </td>
                          </div></tr>
            
                          <hr>

                        <tr><div class="form-floating mb-3">
                            <td><label for="date_transaction">date_transaction</label></td>
                            <td><input type="text" class="form-control" id="date_transaction" placeholder="jj/MM/AA" name="date_transaction"></td>
                            
                          </div></tr>

                          <tr>  
                            <td><button onclick="checkCaptcha()">Check Captcha</button></td>
                            <td><input type="text" id="captchaInput" placeholder="Entre le texte"></td></tr>
                          <td><br>
                           <div class="d-grid mb-2">
                          <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" >Transaction</button></td></centre>
                          </div></tr>
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