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
    <div class="w-1/2 mx-auto border-4 border-white-500 p-5 rounded-sm text-center items-center justify-center">
        <form action="" method="post" enctype="multipart/form-data">
            <span class="text-white">Pseudo :</span><input
                class="mx-auto mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="pseudo" type="text" value="<?= $_SESSION['user']['User_Pseudo'] ?>"></input><br>
            <span class="text-white">Nom :</span> <input
                class="mx-auto mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="prenom" type="text" value="<?= $_SESSION['user']['User_Nom'] ?>"><br>
            <span class="text-white">Prénom :</span><input
                class="mx-auto mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="nom" type="text" value="<?= $_SESSION['user']['User_Prenom'] ?>"><br>
            <span class="text-white">Né le :</span><input
                class="mx-auto mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="birthdate" type="text" value="<?= $_SESSION['user']['User_DateDeNaissance'] ?>"><br>

            <?php if (empty($_FILES['User_Photo']['name']) && !empty($_SESSION['user']['User_Photo'])): ?>
                <span class="text-white">Photo actuelle : </span><img
                    src="../assets/img/<?php echo $_SESSION['user']['User_Photo']; ?>" class="mx-auto mt-4" alt="Profile picture"><br>
            <?php endif; ?>
            <span class="text-white">Choisir une nouvelle photo </span><input type="file" name="User_Photo"
                accept="image/*"><br>
            <input type="submit" value="Enregistrer"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 my-3">
        </form>
        <a href="../controllers/controller-profile.php"
            class="mt-4 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 my-3">Retour
            sur le profil</a>
    </div>





    <script src="script.js">

    </script>
</body>

</html>