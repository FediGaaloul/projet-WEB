<?php
include_once '../config.php';
include_once '../controllor/transactionc.php';
include_once '../model/transaction.php';

$error = "";
$tr;
$trc = new TransactionC;

if (
  isset($_POST["id_transaction"]) &&
  isset($_POST["id_cours"]) &&
  isset($_POST["id_user"]) &&
  isset($_POST["id"]) &&
  isset($_POST["montant"]) &&
  isset($_POST["date_transaction"])
  ) {
  if (
    !empty($_POST["id_transaction"]) &&
    !empty($_POST['id_cours']) &&
    !empty($_POST["id_user"]) &&
    !empty($_POST["id"]) &&
    !empty($_POST["montant"]) &&
    !empty($_POST["date_transaction"])
  ) {
    $tr = new Transaction(
      $_POST['id_transaction'],
      $_POST['id_cours'],
      $_POST['id_user'],
      $_POST['id'],
      $_POST['montant'],
      $_POST['date_transaction']
    );
    $trc->modifierTransaction($tr, $_POST["id_transaction"]);
    header('Location: affichertransaction.php');
    exit(); // Arrêter l'exécution après la redirection
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="cours.php">Cours</a></li>
            <li class="nav-item"><a class="nav-link" href="Panier.php">Panier</a></li>
            <li class="nav-item"><a class="nav-link" href="paiement.php">Paiement</a></li>
            <li class="nav-item"><a class="nav-link" href="ajoutertransaction.php">Transaction</a></li>
            <li class="nav-item"><a class="nav-link" href="affichertransaction.php">Afficher Liste Transaction</a></li>
            <li class="nav-item dropdown">      
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <h2>Modifier une Transaction</h2>
    </header>

    <section>
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
              <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                <div class="card-img-left d-none d-md-flex">
                  <img src="im1.jpg" class="card-image">
                </div>
                <div class="card-body p-4 p-sm-5">
                  <?php
                  if (isset($_POST['id_transaction'])) {
                    $tr = $trc->recupererTransaction($_POST['id_transaction']);
                    ?>
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Transaction</h5>
                    <form action="#" method="POST" onsubmit=" validateForm()">
                      <table>
                        <tr>
                          <td>
                            <label for="id">ID Transaction :</label>
                          </td>
                          <td><input type="text" name="id" id="id_transaction" value="<?php echo $tr['id_transaction']; ?>"
                              maxlength="20"></td>
                        </tr>
                        <tr>
                          <div class="form-floating mb-3">
                            <td><label for="id_cours">Id cours</label></td>
                            <td><input type="text" name="id_cours" id="id_cours"
                                value="<?php echo $tr['id_cours']; ?>" maxlength="20"></td>
                          </div>
                        </tr>
                        <tr>
                          <div class="form-floating mb-3">
                            <td><label for="id_user">Id_user</label></td>
                            <td><input type="text" name="id_user" id="id_user"
                                value="<?php echo $tr['id_user']; ?>" maxlength="20">
                            </td>
                          </div>
                        </tr>
                        <hr>
                        <tr>
                          <div class="form-floating mb-3">
                            <td><label for="id">Id carte</label></td>
                            <td><input type="text" name="id" id="id"
                                value="<?php echo $tr['id']; ?>" maxlength="20"></td>
                          </div>
                        </tr>
                        <tr>
                          <div class="form-floating mb-3">
                            <td><label for="montant">Montant </label></td>
                            <td><input type="text" name="montant" id="montant"
                                value="<?php echo $tr['montant']; ?>"></td>
                          </div>
                        </tr>
                        <div class="form-floating mb-3">
                          <td><label for="date_transaction">Date_transaction</label></td>
                          <td><input type="text" name="date_transaction" id="date_transaction" value="<?php echo $tr['date_transaction']; ?>">
                          </td>
                        </div>
                        <tr>
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
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </section>
  </main>

  <!-- Footer-->
  <footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
      <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto">
          <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
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
</body>

</html>