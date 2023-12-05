<?php
include_once "../controller/tache.php";

$c = new TicketC();

// Récupérer le statut filtré depuis la requête GET
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

// Utilisation de la méthode listTickets en fonction du filtre de statut
if (!empty($statusFilter)) {
    $tab = $c->listTicketsByStatus($statusFilter);
} else {
    $tab = $c->listTickets();
}
?>
<?php
include_once "../controller/tache.php"; // Assurez-vous que le chemin du fichier et le nom de la classe sont corrects

$c = new TicketC();
$tab = $c->listTickets(); // Utilisation de la méthode listTickets pour récupérer la liste des tickets

?>

 
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Support et Service Client</title>

    <!-- Custom fonts for this template -->
    <link href="all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
        function Search() {
            let word = document.getElementById("searchInput").value.toLowerCase();

            for (let i = 0; i < document.getElementsByClassName("recherche").length; i++) {
                document.getElementsByClassName("recherche")[i].style.display = "";
            }

            for (let i = 0; i < document.getElementsByClassName("recherche").length; i++) {
                let arr = document.getElementsByClassName("recherche")[i].innerText.toLowerCase().split("\n");
                let result = arr.some((elem) => {
                    return elem.includes(word);
                });
                !result ? document.getElementsByClassName("recherche")[i].style.display = "none" : document.getElementsByClassName("recherche")[i].style.display = "";
            }
        }
    </script>
     <script>
function sortTable() {
    let sortBy = document.getElementById("sortSelect").value;
    let columnIndex;
    let sortOrder = 1; // Par défaut, tri croissant

    if (sortBy === "alphabetic") {
        columnIndex = 2; // Indice de la colonne à trier alphabétiquement (titre)
    } else if (sortBy === "latest") {
        columnIndex = 0; // Indice de la colonne à trier par dernier (id_quiz)
    } else if (sortBy === "priority_asc") {
        columnIndex = 7; // Indice de la colonne priorité
       // sortOrder = 1; // Tri croissant
    } else if (sortBy === "priority_desc") {
        columnIndex = 7; // Indice de la colonne priorité
        sortOrder = -1; // Tri décroissant
    }

    let tableBody = document.querySelector('.table tbody');
    let rows = Array.from(tableBody.children);

    let sortedRows = rows.sort((a, b) => {
        let textA = a.children[columnIndex].innerText.trim().toLowerCase();
        let textB = b.children[columnIndex].innerText.trim().toLowerCase();

        // Comparaison en fonction du tri par priorité
        if (columnIndex === 7) {
            return (parseInt(textA) - parseInt(textB)) * sortOrder;
        }

        return textA.localeCompare(textB) * sortOrder;
    });

    tableBody.innerHTML = ""; // Clear the table body

    sortedRows.forEach(row => {
        tableBody.appendChild(row);
    });
}

</script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">support  </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           

            <!-- Heading -->
           

            <!-- Divider -->
          

            <li class="nav-item active">
                <a class="nav-link" href="listT.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Liste de tickets</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item active">
                <a class="nav-link" href="listi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Liste d'interractions</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                  
                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">support et service client</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            
                        </li>

                    </ul>

                </nav>
               
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste de tickets</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <a href="addT.php">Ajouter ticket</a> </h6>

                        </div>
                          
                        <form class="form-inline mr-auto w-100 navbar-search">
                         <div class="input-group">
                         <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Rechercher..."
                          aria-label="Search" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <button class="btn btn-primary" type="button" onclick="Search()">
                               <i class="fas fa-search fa-sm"></i>
            </button>
                                <select id="sortSelect" onchange="sortTable()">
                                 <option value="latest"> IDticket croissant</option>
                                 <option value="alphabetic"> Ordre alphabetique(NP)</option>
                                 <option value="priority_asc"> Priorite croissant</option>
                                 <option value="priority_desc"> Priorite décroissant</option>
                               </select>

            <form action="" method="GET">
    <label for="status">Filtrer par statut :</label>
    <select name="status" id="status">
        <option value="">Tous</option>
        <option value="en cours">En cours</option>
        <option value="terminé">Terminé</option>
        <!-- Ajoutez d'autres options de statut si nécessaire -->
    </select>
    <input type="submit" value="Filtrer">
</form>
        </div>
    </div>
</form>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IDT</th>
                                            <th>IDU</th>
                                            <th>Nom Prenom</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Sujet</th>
                                            <th>Statut</th>
                                            <th>Priorite</th>
                                            <th>update</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>IDT</th>
                                            <th>IDU</th>
                                            <th>Nom Prenom</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Sujet</th>
                                            <th>Statut</th>
                                            <th>Priorite</th>
                                            <th>update</th>
                                            <th>delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($tab as $ticket) {
                                        ?>
                                            <tr class="recherche">
                                               
                                                <td><?= $ticket['IDT']; ?></td>
                                                <td><?= $ticket['IDU']; ?></td>
                                                <td><?= $ticket['NomPrenom']; ?></td>
                                                <td><?= $ticket['email']; ?></td>
                                                <td><?= $ticket['phone']; ?></td>
                                                <td><?= $ticket['sujet']; ?></td>
                                                <td><?= $ticket['statut_ticket']; ?></td>
                                                <td><?= $ticket['priorite']; ?></td>
                                                <td>
                                                            <form method="POST" action="updateT.php">
                                                            <a href="updateT.php?IDT=<?php echo $ticket['IDT']; ?>">modifier</a>
                                                            </form>
                                                        </td>
                                                        <td>
                                                        <form method="POST" action="deleteT.php">
                                                        <a href="deleteT.php?IDT=<?php echo $ticket['IDT']; ?>">Supprimer</a>
                                                            </form>
                                                            
                                                        </td>
                                                
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

   
  
    
       
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
   
    
    
   


</body>

</html>
    

