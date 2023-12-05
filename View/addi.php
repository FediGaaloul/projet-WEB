<?php

include_once '../Controller/inter.php';
include_once '../Model/intermodel.php';
include_once '../Controller/tache.php';
$error = "";

$TicketC = new TicketC();
$qqq = $TicketC->listTickets();
// create client
$inter = null; // Initialisation de $ticket à null

// Créer une instance du contrôleur TicketC
$interC = new interC();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $error = "";
    $qqq = new TicketC();
if (
    isset($_POST["IDi"]) &&
    isset($_POST["IDt"]) &&
    isset($_POST["type_interv"]) 
 
) {
    if (
        !empty($_POST["IDi"]) &&
        !empty($_POST['IDt']) &&
        !empty($_POST["type_interv"]) 
        ) {
        $inter = new inter(
            null, 
            $_POST['IDt'],
            $_POST['type_interv']
           
        );

        // Ajouter le ticket via le contrôleur TicketC
        $interC->addinter($inter);

        // Redirection vers une page listant les tickets d'intervention
        header('Location: listi.php');
    }
}}



?>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Support et Service Client</title>
       
        <link rel="icon" type="image/x-icon" href="logo.ico" />
      
       
      
        <link href="template.css" rel="stylesheet" />
        <script src="verif.js" defer></script>
        <script>
        function validateForm() {  
            let IDT = document.getElementById("IDi").value.trim();
            let interract = document.getElementById("interract").value.trim();
           
            

            if (sujet.length === 0) {
                alert("Le sujet ne peut pas être vide.");
                return false;
            }

            

            return true;
        }
    </script>
   

    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
          
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">Apprentech</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">acceuil</a></li>
                       
                            
                       
                            <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                           
                         
                        </ul>
                    </div>
                </div>
            </nav>
        
            <section class="py-5">
                <div class="container px-5">
             
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Ajouter interraction</h1>
                           
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                               
                               <!-- <form id="contactForm" data-sb-form-api-token="API_TOKEN">-->
                               <form action="" method="POST" onsubmit="return validateForm()">
                                    <div class="form-floating mb-3">
                                    <td>IDT</td>
                                   <td>
                                       <select name="IDT">
                                      <?php foreach ($qqq as $ticket) : ?>
                                       <option value="<?= $ticket['IDT'] ?>"><?= $ticket['IDT']?></option>
                                     <?php endforeach; ?>
                                     </select>
                                    </td>
                                        
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="IDi" type="text"  />
                                        <label for="IDi">IDi</label>
                                        
                                    </div>                            
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="Type d'intervention"  style="height: 10rem" ></textarea>
                                        <label for="Type d'intervention">Type d'intervention</label>
                                   </div>
                                    
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                   
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit"  >Envoyer</button></div>
                                    
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


