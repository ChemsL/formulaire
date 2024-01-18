<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Inscription</title>
</head>

<body>

    <h1>SIGN IN</h1>

    <form action="../controllers/controller-signin.php" method="post" novalidate>
        <label for="email">Adresse mail :</label><br>
        <input type="text" id="email" name="email" value="" required><?php if (empty($_POST["email"])) {
                                                                            echo '<span>Champs obligatoire.</span>';
                                                                        } ?><br>

        <label for="mot_de_passe">Mot de passe :</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <input class="submit" type="submit" value="Se connecter">

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

</body>

</html>