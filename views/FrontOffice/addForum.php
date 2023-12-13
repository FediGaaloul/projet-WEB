<!DOCTYPE html>
<html>

<head>
    <title>add form</title>
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../../css/index.css">
    <script>
        function validateForm() {
            const sujetInput = document.getElementById('sujet');
            const descriptionInput = document.getElementById('description');
            const submitButton = document.getElementById('submitButton');

            if (sujetInput.value === '' || descriptionInput.value === '') {

                alert('Les champs doivent être remplis');
                return false;
            } else {
                submitButton.disabled = false;
                return true;
            }
        }
    </script>
</head>

<body class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? 'dark-mode' : ''; ?>">
    <div class="nav">
        <ul>
            <li> <a href='forum.php'> List des forums </a> </li>
        </ul>
    </div>
    <div id="darkModeToggleContainer">
        <button id="darkModeToggle"><?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? '☀️' : '🌙'; ?></button>
    </div>
    <div class="creation">
        <h1> Ajouter un nouveau sujet au forum </h1>

        <form action="addformC.php" method="POST" onsubmit="return validateForm()" class="creation-form">
            <label>
                Sujet
            </label>
            <input id="sujet" name="sujet" type="text">
            <label>
                type
            </label>
            <input id="type" name="type" type="text">
            <label>
                Description
            </label>

            <textarea id="description" name="description" rows="5" cols="33">
</textarea>


            <button id="submitButton" type="submit"> Ajouter</button>

        </form>
        <div>
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
            </script>
</body>

</html>