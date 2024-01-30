<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Home</title>
</head>





<body>


    <header class="navLinks">

    <div class="burger-menu" onclick="toggleMenu()">
            <i class="bi bi-list"></i>
        </div>

        <a href="../controllers/controller-deconnexion.php"><i class="bi bi-box-arrow-left"></i> Déconnexion</a>
        <a href="../controllers/controller-profile.php"><i class="bi bi-person-circle"></i> MON PROFIL</a>
        <a href="../controllers/controller-historique.php"><i class="bi bi-clock-history"></i> Historique</a>
        <a href="../controllers/controller-trajet.php"><i class="bi bi-plus-lg"></i> Ajouter un trajet</a>



    </header>

    <p class="date"><?php
                    $dateDuJour = date("d-m-Y");

                    echo "Date du jour : " . $dateDuJour;
                    ?>
    </p>



    <?php 
if (empty($photo)) {
    echo '<img class="randompp" src="../assets/img/randomProfilePic.png" alt="Profile picture random">';
} else {
    echo '<img class="randompp" src="../assets/img/' . $photo . '" alt="Profile picture">';
}
?>


    <div class="mainHome">

       <h1>Bienvenue <?= $pseudo ?></h1> 


    </div>


    <script src="../assets/script.js">
        
    </script>

</body>

</html>