<?php
require_once '../../Controller/forumC.php';

$id_forum = $_GET["id"];
$forum = getForumById($id_forum); // retour de forum par id

$sujet = $forum['sujet'];
$descreption = $forum['description'];






?>

<!DOCTYPE html>
<html>

<head>
    <title>update forum</title>
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../../css/index.css">
    <script>
        function isUppercase(chr) {
            return chr === chr.toUpperCase();
        }

        function validateForm() {
            const sujetInput = document.getElementById('sujet');
            const descriptionInput = document.getElementById('description');
            const submitButton = document.getElementById('submitButton');
            console.log(sujetInput.value, isUppercase(sujetInput.value));
            if (!isUppercase(sujetInput.value)) {
                alert('le sujet doit etre en majuscule');
                return false;
            }
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
        <h1> modifier le forum</h1>

        <form action="updateforumc.php" method="POST" onsubmit="return validateForm()" class="creation-form">


            <input name="id" type="hidden" value="<?php echo $id_forum; ?>">

            <label>
                Sujet
            </label>
            <input id="sujet" name="sujet" type="text" value="<?php echo  $sujet; ?>">
            <label>
                Description
            </label>

            <textarea id="description" name="description" rows="5" cols="33"><?php echo $descreption; ?>
</textarea>

            <button id=" submitButton" type="submit">modifier</button>

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