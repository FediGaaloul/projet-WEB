<?php

require_once "../../Controller/forumC.php";


if (isset($_GET['type'])) {

    $type = $_GET['type'];
    $listforum = getForumByType($type);
} else {

    $listforum = listforum();
}
$typelis = getAllTypeForum();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>liste form</title>
    <link rel="stylesheet" href="../../css/index.css">

</head>


<body class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? 'dark-mode' : ''; ?>">
    <div class="nav">
        <ul>
            <li> <a href='addforum.php'> Ajouter un sujet </a> </li>
        </ul>
    </div>
    <div id="darkModeToggleContainer">
        <button id="darkModeToggle"><?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? '☀️' : '🌙'; ?></button>
    </div>

    <div class="container">
        <div class="header">
            <h1>
                Liste des sujets du forum svp
            </h1>
        </div>
        <div class="body">
            <h3>rechercher par type:</h3>
            <form>
                <select name="type" id="type">
                    <?php
                    foreach ($typelis as $t) {
                        echo "
                    <option value={$t['type']}>{$t['type']}</option>
                    ";
                    }
                    ?>
                </select>
                <button type="submit"> rechercher</button>
            </form>
            <div class="liste">
                <?php
                foreach ($listforum as $value) {
                    echo "
                                          <div class='liste-forum'>

                                                        <h2> {$value['sujet']} </h2>
                                                        <h3> {$value['type']} </h3>
                                                        <p> {$value['description']} </p>
                                                        <a href='detailsforum.php?id={$value['id']}' class='btn'> Accéder au salon </a>
                                                        <a href='updateForum.php?id={$value['id']}' class='btn'> modifier le salon </a>
                                                      
                                                        <button onclick='confirmDelete({$value['id']})' class='btn'>Supprimer</button>
                                                        


                                          </div>
                                          ";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.querySelector('body');
            const darkModeToggle = document.getElementById('darkModeToggle');

            darkModeToggle.addEventListener('click', function() {
                body.classList.toggle('dark-mode');
                const isDarkModeEnabled = body.classList.contains('dark-mode');
                document.cookie = `dark_mode=${isDarkModeEnabled ? 'enabled' : 'disabled'}; path=/;`;
                darkModeToggle.innerHTML = isDarkModeEnabled ? '☀️' : '🌙';
            });
        });

        function confirmDelete(forumId) {
            var userConfirmed = window.confirm("Voulez-vous vraiment supprimer ce message?");

            if (userConfirmed) {

                window.location.href = "deleteforum.php?id=" + forumId;
            }
        }
    </script>
</body>