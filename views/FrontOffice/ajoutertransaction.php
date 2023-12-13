<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../Controller/payementc.php';
include_once '../../Controller/transactionc.php';
include_once '../../Model/transaction.php';
include_once '../../Controller/coursC.php';

$carte = new PayementC();
$aaa = $carte->afficherpayements();

$cours = new coursC();
$ccc = $cours->affichercours();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["id_cours"]) &&
        isset($_POST["id_carte"]) &&
        isset($_POST["montant"]) &&
        isset($_POST["date_transaction"])
    ) {
        // The key "id_cours" exists in the $_POST array
        $id_cours = $_POST["id_cours"];
        $id_carte = $_POST["id_carte"];
        $montant = $_POST["montant"];
        $date_transaction = $_POST["date_transaction"];

        // Use these variables in your Transaction object or further processing
        $transaction = new Transaction(
            null,
            $id_cours,
            $id_carte,
            $montant,
            $date_transaction
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
                        <li class="nav-item"><a class="nav-link" href="affichertransaction.php">afficher Liste Transaction </a></li>
                        <li class="nav-item dropdown"></ul>
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
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Operation de Transaction</h5>
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <div class="form-floating mb-3">
                                            <td>ID Cours:</td>
                                            <td>
                                                <select name="id_cours">
                                                    <?php foreach ($ccc as $cours) : ?>
                                                        <option value="<?= $cours['ID_Cours'] ?>"><?= $cours['ID_Cours']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-floating mb-3">
                                            <td>ID carte:</td>
                                            <td>
                                                <select name="id_carte">
                                                    <?php foreach ($aaa as $carte) : ?>
                                                        <option value="<?= $carte['id'] ?>"><?= $carte['id']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-floating mb-3">
                                            <td><label for="montant">Montant</label></td>
                                            <td><input type="text" class="form-control" id="montant" placeholder="" name="montant"></td>
                                        </div>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <div class="form-floating mb-3">
                                            <td><label for="date_transaction">date_transaction</label></td>
                                            <td><input type="date" class="form-control" id="date_transaction" placeholder="jj/MM/AA" name="date_transaction"></td>
                                        </div>
                                    </tr>
                                    <td><br>
                                        <div class="d-grid mb-2">
                                            <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Transaction</button>
                                        </div>
                                    </td>
                                    </tr>
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
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                   
