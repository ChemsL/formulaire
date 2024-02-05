<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Inscription</title>
</head>

<body>



<a href="../controllers/controller-signin.php"             class="lg:w1-6 sm:w-1/4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 text-center dark:focus:ring-blue-800 mt-20 mx-0">Se connecter</a>

    <div class="bodyInscription">
        <h1>S'INSCRIRE</h1>

        <?php if ($showform) { ?>


            <form class="flex justify-center items-center flex-col" action="" method="post" novalidate>

                <label class="text-purple-200" for="nom">Nom :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="text" id="nom" name="nom" value="<?php if (!empty($nom)) {
                        echo $nom;
                    } ?>" required><br>

                <label class="text-purple-200" for="prenom">Prénom :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="text" id="prenom" name="prenom" value="<?php if (!empty($prenom)) {
                        echo $prenom;
                    } ?>" required><br>

                <label class="text-purple-200" for="pseudo">Pseudo :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="text" id="pseudo" name="pseudo" value="<?php if (!empty($pseudo)) {
                        echo $pseudo;
                    } ?>" required><br>


                <label class="text-purple-200" for="birthdate">Date de naissance :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="date" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) {
                        echo $birthdate;
                    } ?>" required><br>


                <label class="text-purple-200" for="email">Email :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="email" id="email" name="email" value="<?php if (!empty($email)) {
                        echo $email;
                    } ?>" required><br>

                <label class="text-purple-200" for="mot_de_passe">Mot de passe :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="password" id="mot_de_passe" name="mot_de_passe" required><br>

                <label class="text-purple-200" for="mot_de_passe_confirmation">Confirmer le mot de passe :</label><br>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-1/4 sm:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="password" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required><br>
                <label class="text-purple-200" for="entreprise">Entreprise :</label><br>
                <select
                    class="block lg:w-1/4 sm:w-1/2 p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    id="entreprise" name="entreprise">
                    <option value="">-- Quelle est votre entreprise ?</option>
                    <?php
                    $selectedEntreprise = isset($_POST['entreprise']) ? $_POST['entreprise'] : '';

                    foreach (Entreprise::getEntreprise() as $entreprise) {
                        $entrepriseID = $entreprise["Entreprise_ID"];
                        $entrepriseNom = $entreprise["Entreprise_Nom"];
                        $isSelected = ($selectedEntreprise == $entrepriseID) ? 'selected' : '';
                        ?>
                        <option value="<?= $entrepriseID ?>" <?= $isSelected ?>>
                            <?= $entrepriseNom ?>
                        </option>
                    <?php } ?>
                </select>


                <label for="cgu">Accepter les CGU :</label>
                <input type="checkbox" id="cgu" name="cgu" required>
                <label for="cgu">J'ai lu et j'accepte les CGU.</label><br>


                <input
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm lg:w-1/4 sm:w-1/2 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    type="submit" value="S'inscrire">

                <?php
                // Affichage des erreurs s'il y en a
                if (!empty($erreurs)) {
                    echo "<div class='errors' >";
                    foreach ($erreurs as $erreur) {
                        echo "<p>$erreur</p>";
                    }
                    echo "</div>";
                    $nom;
                }
                ?>

            </form>
            

        <?php } ?>
    </div>

</body>

</html>