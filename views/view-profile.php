<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Mon profile</title>
</head>

<?php include_once('../assets/header.php') ?>

<body>
    <a href="../controllers/controller-home.php">Home</a>


    <div class="infoProfile">

   <?php if (empty($photo)) {
    echo '<img class="randompp" src="../assets/img/randomProfilePic.png" alt="Profile picture random">';
} else {
    echo '<img class="randompp" src="../assets/img/' . $photo . '" alt="Profile picture">';
} ?>
        Pseudo :
        <?= $_SESSION['user']['User_Pseudo'] ?><br>
        <?= `
<img src="../assets/img/<?= $photo ?>" alt="">`
            ?><br>
        Nom :
        <?= $_SESSION['user']['User_Nom'] ?><br>
        Prénom :
        <?= $_SESSION['user']['User_Prenom'] ?><br>
        Né le
        <?= $_SESSION['user']['User_DateDeNaissance'] ?><br>
        Entrprise :
        <a href="../controllers/controller-updateprofile.php" class="update">Modifier mes informations</a>

    </div>
<form action="../controllers/controller-deleteaccount.php" method="post">
    <input type="hidden" name="User_ID" value="delete">
    <input type="submit" value="Supprimer mon compte" name="delete"class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
    </form>


    <script src="script.js">

    </script>
</body>

</html>