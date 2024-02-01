<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>





<body>

<?php include_once('../assets/header.php') ?>


    <h2 class="date">
        <?php
        $dateDuJour = date("d-m-Y");

        echo "Date du jour : " . $dateDuJour;
        ?>
    </h2>



    <?php
    if (empty($photo)) {
        echo '<img class="randompp" src="../assets/img/randomProfilePic.png" alt="Profile picture random">';
    } else {
        echo '<img class="randompp" src="../assets/img/' . $photo . '" alt="Profile picture">';
    }
    ?>


    <div class="mainHome">

        <h1>Bienvenue
            <?= $pseudo ?>
        </h1>


    </div>


    <script src="../assets/script.js">

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Récupérer le bouton du menu mobile
            var mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');

            // Récupérer le menu mobile
            var mobileMenu = document.getElementById('mobile-menu');

            // Ajouter un gestionnaire d'événements au clic sur le bouton du menu mobile
            mobileMenuButton.addEventListener('click', function () {
                // Basculer la classe 'hidden' pour montrer/cacher le menu mobile
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>

</body>

</html>