<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Connexion</title>
</head>

<body>
<a href="../controllers/controller-signup.php"
class="lg:w1-6 sm:w-1/4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 text-center dark:focus:ring-blue-800 mt-20 mx-0">S'inscrire</a>
    <div class="bodyConnect">

        <h1 class="text-6xl">SE CONNECTER</h1>
        


        <form class="flex justify-center items-center flex-col" action="../controllers/controller-signin.php"
            method="post" novalidate>
            <label class="text-purple-200" for="email">Adresse mail :</label><br>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required> <span>
                <?= $errors['email'] ?? '' ?>
            </span><br>
            <label class="text-purple-200" for="mot_de_passe">Mot de passe :</label><br>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="password" id="mot_de_passe" name="mot_de_passe" required><span>
                <?= $errors['mot_de_passe'] ?? '' ?>
            </span><br>
            <p>
                <?= $errors['connexion'] ?? '' ?>
            </p>
            <input
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm lg:w-1/4 sm:w-1/2 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                type="submit" value="Se connecter">

        </form>
        

    </div>

    <script src="script.js">

    </script>
</body>

</html>