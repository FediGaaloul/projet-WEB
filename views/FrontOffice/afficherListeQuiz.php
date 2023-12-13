<?php
include_once '../../Controller/QuizC.php';

// Get the current page number from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Get the selected number of items per page from the URL or use a default value
$itemsPerPage = isset($_GET['itemsPerPage']) ? $_GET['itemsPerPage'] : 5;

$q = new QuizC();

// Retrieve quiz list for the current page
$listeQuiz = $q->afficherQuizpag($page, $itemsPerPage);

// Get total number of quizzes for pagination
$totalQuizzes = $q->getTotalQuizzes();

// Calculate total pages
$totalPages = ceil($totalQuizzes / $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Liste des quiz </title>
    <link rel="icon" type="../image/x-icon" href="logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
    <script>
        function Search() {
            let word = document.getElementById("searchInput").value.toLowerCase();

            for (let i = 0; i < document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4").length; i++) {
                document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].style.display = "";
            }

            for (let i = 0; i < document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4").length; i++) {
                let arr = document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].innerText.toLowerCase().split("\n");
                let result = arr.some((elem) => {
                    return elem.includes(word);
                });
                !result ? document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].style.display = "none" : document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].style.display = "";
            }
        }
        
        function toggleDarkMode() {
            // Sélectionnez le corps de la page
            const body = document.body;

            // Ajoutez ou supprimez la classe 'dark-mode' pour basculer entre les modes
            body.classList.toggle('dark-mode');
        }
        function sortTable() {
            let sortBy = document.getElementById("sortSelect").value;
            let columnIndex;

            if (sortBy === "alphabetic") {
                columnIndex = 1; // Indice de la colonne à trier alphabétiquement (titre)
            } else if (sortBy === "latest") {
                columnIndex = 0; // Indice de la colonne à trier par dernier (id_quiz)
            }

            let tableBody = document.querySelector('.table tbody');
            let rows = Array.from(tableBody.children);
            let sortedRows = rows.sort((a, b) => {
                let textA = a.children[columnIndex].innerText.trim().toLowerCase();
                let textB = b.children[columnIndex].innerText.trim().toLowerCase();
                return textA.localeCompare(textB);
            });

            tableBody.innerHTML = ""; // Clear the table body

            sortedRows.forEach(row => {
                tableBody.appendChild(row);
            });
        }
        function changeItemsPerPage(value) {
            window.location.href = '?page=1&itemsPerPage=' + value;
        }
    </script>
</head>

<body class="d-flex flex-column">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">ApprenTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="afficherlisteQuestion.php">Liste des Question</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="ajouterQuiz.php">Ajouter un Quiz</a></li>
                    <li class="nav-item dropdown">
                    </li>
                    <li>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                            <button class="btn btn-primary" onclick="Search()">Search</button>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-dark" onclick="toggleDarkMode()">Mode Sombre</button>
                    </li>
                    <li class="nav-item">
                        <select class="form-control" onchange="sortTable()" id="sortSelect">
                            <option value="alphabetic">Sorting by alphabetic</option>
                            <option value="latest">Sorting latest</option>
                        </select>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
 <!-- Page content -->
 <section class="py-5">
        <div class="container px-5">
            <!-- Dropdown for selecting items per page -->
            <div class="mb-3">
                <label for="itemsPerPageSelect" class="form-label">Items Per Page:</label>
                <select class="form-control" id="itemsPerPageSelect" onchange="changeItemsPerPage(this.value)">
                    <option value="5" <?php echo ($itemsPerPage == 5) ? 'selected' : ''; ?>>5</option>
                    <option value="10" <?php echo ($itemsPerPage == 10) ? 'selected' : ''; ?>>10</option>
                    <option value="20" <?php echo ($itemsPerPage == 20) ? 'selected' : ''; ?>>20</option>
                    <option value="100" <?php echo ($itemsPerPage == 100) ? 'selected' : ''; ?>>100</option>
                </select>
            </div>
            <!-- Table for displaying quiz list -->
            <table class="table" border="1" align="center">
                <thead>
                    <tr>
                        <th>id_quiz</th>
                        <th>titre</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listeQuiz as $Quiz): ?>
                        <tr class="col-sm-3 col-md-6 col-lg-4">
                            <td><?php echo $Quiz['id_quiz']; ?></td>
                            <td><?php echo $Quiz['titre']; ?></td>
                            <td>
                                <form method="POST" action="modifierQuiz.php">
                                    <input type="submit" name="Modifier" value="Modifier">
                                    <input type="hidden" value="<?php echo $Quiz['id_quiz']; ?>" name="id_quiz">
                                </form>
                            </td>
                            <td>
                                <a href="supprimerQuiz.php?id_quiz=<?php echo $Quiz['id_quiz']; ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Pagination -->
    <div class="container px-5">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&itemsPerPage=<?php echo $itemsPerPage; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
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
</body>
</html>
