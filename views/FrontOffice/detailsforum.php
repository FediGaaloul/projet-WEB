<?php
require_once "../../Controller/forumC.php";
require_once "../../Controller/messageC.php";



// ouvrir une modale au clier sur repondre

$idForm = $_GET['id'];


$form = getForumById($idForm);
$listMessage = listMessageByIdForul($idForm);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>detais forum</title>
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../../css/index.css">

</head>
<script>
    function validateForm() {
        const contenuInput = document.getElementById('contenu');
        const submitButton = document.getElementById('submitButton');

        if (contenuInput.value === '') {
            contenuInput.style.borderColor = 'red';
            submitButton.disabled = true;
            alert('Le champs doit être remplis');
            return false;
        } else {
            contenuInput.style.borderColor = '';
            submitButton.disabled = false;
            return true;
        }
    }

    function confirmDelete(messageId, forumId) {
        var userConfirmed = window.confirm("Voulez-vous vraiment supprimer ce message?");

        if (userConfirmed) {

            window.location.href = "deletemessage.php?id=" + messageId + '&forumId=' + forumId;
        }
    }

    function confirmeLike(messageId, forumId) {
        window.location.href = "likemessage.php?id=" + messageId + '&forumId=' + forumId;
    }

    function confirmeDisLike(messageId, forumId) {
        window.location.href = "dislikemessage.php?id=" + messageId + '&forumId=' + forumId;
    }
</script>

<body class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? 'dark-mode' : ''; ?>">
    <div class="nav">
        <ul>
            <li> <a href='addforum.php'> Ajouter un sujet </a> </li>
            <li> <a href='forum.php'> List des forums </a> </li>

        </ul>
    </div>
    <div id="darkModeToggleContainer">
        <button id="darkModeToggle"><?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? '☀️' : '🌙'; ?></button>
    </div>
    <div class="container">
        <div class="header">
            <h1> <?php echo $form['sujet']; ?> </h1>
            <p> <?php echo $form['description']; ?> </p>
        </div>
        <div class="body">
            <div class="message">
                <?php

                if (empty($listMessage)) {
                    echo "aucun message n est disponible";
                }
                function veriflike($like)
                {
                    if ($like === 1) {
                        return  'like';
                    } else {
                        return 'no like';
                    }
                }
                function verifDislike($dislike)
                {
                    if ($dislike === 1) {
                        return  'like';
                    } else {
                        return 'no like';
                    }
                }

                foreach ($listMessage as $value) {

                    echo "
                            <div class='message'>
                            <p> {$value['contenu']} </p>
                       
                           
                            <button onclick='confirmDelete({$value['id']},{$value['id_forum']})'>Supprimer</button>
                         
                <p> " . nbLike($value['id']) . " <span onclick='confirmeLike({$value['id']},{$value['id_forum']})'> &#128077</span> 
                 " . nbDisLike($value['id']) . " <span onclick='confirmeDisLike({$value['id']},{$value['id_forum']})'> &#128078</span> </p>         
                </div>
                            
                            ";
                }



                ?>
            </div>

            <div class="repondre">
                <form action="addmessageC.php" method="POST" onsubmit="return validateForm()">
                    <input name="idForm" type="hidden" value="<?php echo $idForm; ?>">

                    <label for="contenu">Repondre:</label>
                    <input id="contenu" name="contenu" type="text">

                    <button id="submitButton" type="submit" class="btn">Envoyer</button>
                    <button type="button" onclick="showEmojiModal()">Insérer un emoji</button>
                </form>
            </div>
            <div id="emojiModal" style="display: none;">
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
        </script>
</body>