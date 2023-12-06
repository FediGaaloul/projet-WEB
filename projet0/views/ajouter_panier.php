<?php
include_once 'C:\xampp\htdocs\projet0\con_dbb.php';
 if(!isset($_SESSION)){
    session_start();
 }

 if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
 }
  if(isset($_GET['id_cours'])){//si un id a été envoyé alors :
    $id = $_GET['id_cours'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($con ,"SELECT * FROM cours WHERE id_cours = $id") ;
    if(empty(mysqli_fetch_assoc($row))){
        //si ce produit n'existe pas
        die("Ce cours n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['panier'][$id])){// si le produit est déjà dans le panier
        $_SESSION['panier'][$id]++; //Représente la quantité 
    }else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id]= 1 ;
    }

   //redirection vers la page index.php
   header("Location:cours.php");


  }
?>