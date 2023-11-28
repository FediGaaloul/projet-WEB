<?php
include_once '../Controller/coursC.php';
$q = new coursC();
$listecours = $q->affichercours();
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
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
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
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                <button class="btn btn-primary" onclick="Search()">Search</button>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <button><a href="ajoutercours.php">Ajouter un cours</a></button>
            <center>
                <h1>Liste des courss</h1>
            </center>
            <table border="1" align="center">
                <tr>
                    <th>ID_Cours</th>
                    <th>Titre_C</th>
                    <th>Date_D_C</th>
                    <th>Date_F_C</th>
                    <th>Niv_Diff</th>
                    <th>Categories</th>
                    <th>ID_utlisateur</th>
                    <th>Status</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($listecours as $cours) {
                    ?>
                    <tr class="recherche">
                        <td>
                            <?php echo $cours['ID_Cours']; ?>
                        </td>
                        <td>
                            <?php echo $cours['Titre_C']; ?>
                        </td>
                        <td>
                            <?php echo $cours['Date_D_C']; ?>
                        </td>
                        <td>
                            <?php echo $cours['Date_F_C']; ?>
                        </td>
                        <td>
                            <?php echo $cours['Niv_Diff']; ?>
                        </td>
                        <td>
                            <?php echo $cours['Categories']; ?>
                        </td>
                        <td>
                            <?php echo $cours['ID_utlisateur']; ?>
                        </td>
                        <td>
                            <?php echo $cours['Status']; ?>
                        </td>
                        <td>
                            <form method="POST" action="modifiercours.php">
                                <input type="submit" name="Modifier" value="Modifier">
                                <input type="hidden" value=<?PHP echo $cours['ID_Cours']; ?> name="ID_Cours">
                            </form>
                        </td>
                        <td>
                            <a href="supprimercours.php?ID_Cours=<?php echo $cours['ID_Cours']; ?>">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Apprentech2023</div>
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
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>