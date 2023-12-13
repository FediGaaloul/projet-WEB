<?php

include_once '../../Controller/tache.php';
include_once '../../Model/crud.php';

$error = "";

// create client
$ticket = null; // Initialisation de $ticket à null

// Créer une instance du contrôleur TicketC
$TicketC = new TicketC();

if (
    isset($_POST["IDU"]) &&
    isset($_POST["NomPrenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["telephone"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["statut_ticket"]) &&
    isset($_POST["priorite"])
) {
    if (
        !empty($_POST['IDU']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["NomPrenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["telephone"]) &&
        !empty($_POST["statut_ticket"]) &&
        !empty($_POST["priorite"])
    ) {
        // Créer un nouvel objet Ticket avec les données du formulaire
        $ticket = new Ticket(
            $_POST['IDT'], 
            $_POST['IDU'],
            $_POST['NomPrenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['sujet'],
            $_POST['statut_ticket'],
            $_POST['priorite']
        );

        // Ajouter le ticket via le contrôleur TicketC
        $TicketC->addTicket($ticket);

        // Redirection vers une page listant les tickets d'intervention
        header('Location: listT.php');
    }
}



?>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Support et Service Client</title>
       
        <link rel="icon" type="image/x-icon" href="logo.ico" />
      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      
        <link href="template.css" rel="stylesheet" />
        <script src="verif.js" defer></script>
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
          
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">Apprentech</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            
                       
                            <li class="nav-item"><a class="nav-link" href="FAQ.html">FAQ</a></li>
                           
                         
                        </ul>
                    </div>
                </div>
            </nav>
        
            <section class="py-5">
                <div class="container px-5">
             
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Contactez-nous</h1>
                            <p class="lead fw-normal text-muted mb-0">Nous serions ravis de savoir  vos problèmes.</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                               
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                                   
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text"  />
                                        <label for="name">Nom Prénom</label>
                                        
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email"  data-sb-validations="email" />
                                        <label for="email">addresse Email </label>
                                        
                                    </div>
                                  
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone" type="tel"   />
                                        <label for="phone">Téléphone</label>
                                       
                                    </div>
                                   
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text"  style="height: 10rem" ></textarea>
                                        <label for="message">Sujet</label>
                                       
                                    </div>
                                    
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                   
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit"  onsubmit="validateForm()" >Envoyer</button></div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                       
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3" ><i class="bi bi-question-circle"  ></i></div>
                            <div class="h5" >Centre de support </div>
                            <p class="text-muted mb-0">Parcourez les FAQ et les articles de support pour trouver des solutions.</p>
                           </div>
                         <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                            <div class="h5">Appeler</div>
                            <p class="text-muted mb-0">Appelez-nous à tout moment (216) 28346062.</p> 
                        </div>
                    </div>
                </div>
            </section>
        </main>
       
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Apprentech 2023</div></div>
                    <div class="col-auto">
                        
                        <a class="link-light small" href="template.html">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
       
    </body>
</html>


