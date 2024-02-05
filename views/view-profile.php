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


    <div class="max-w-sm rounded overflow-hidden shadow-lg border-white mx-auto" >

        <?php if (empty($photo)) {
            echo '<img class="w-full" src="../assets/img/randomProfilePic.png" alt="Profile picture random">';
        } else {
            echo '<img class="w-full" src="../assets/img/' . $photo . '" alt="Profile picture">';
        } ?>
        <div class="px-6 py-4 text-white">
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
        
    </div>
    <a href="../controllers/controller-updateprofile.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-auto">Modifier mes informations</a>
    </div>
    <form action="../controllers/controller-profile.php" method="post" class="mx-auto mt-12" onsubmit="return confirm('Voulez-vous supprimer le compte?')">
        <input type="submit" name="delete" value="delete"
            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
    </form>


    <script></script>
</body>

</html>