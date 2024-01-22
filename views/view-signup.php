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

    <h1>SIGN UP</h1>
    <a href="../controllers/controller-signin.php">Se connecter</a>

<?php if ($showform) {?>


    <form action="" method="post" novalidate>
        <span class="inputARemplir">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value="<?php if (!empty($nom)) {
                                                                echo $nom;
                                                            } ?>" required><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" value="<?php if (!empty($prenom)) {
                                                                    echo $prenom;
                                                                } ?>" required><br>

            <label for="pseudo">Pseudo :</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?php if (!empty($pseudo)) {
                                                                    echo $pseudo;
                                                                } ?>" required><br>


            <label for="birthdate">Date de naissance :</label><br>
            <input type="date" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) {
                                                                            echo $birthdate;
                                                                        } ?>" required><br>


            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" value="<?php if (!empty($email)) {
                                                                    echo $email;
                                                                } ?>" required><br>

            <label for="mot_de_passe">Mot de passe :</label><br>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

            <label for="entreprise">Entreprise :</label><br>
            <select id="entreprise" name="entreprise" required>
                <option value="1" <?php if (!empty($entreprise) && $entreprise == "1") {
                                        echo "selected";
                                    } ?>>Wiko</option>
                <option value="2" <?php if (!empty($entreprise) && $entreprise == "2") {
                                        echo "selected";
                                    } ?>>Umbro</option><br>


                <label for="cgu">Accepter les CGU :</label>
                <input type="checkbox" id="cgu" name="cgu" required>
                <label for="cgu">J'ai lu et j'accepte les CGU.</label><br>

        </span>
        <input class="submit" type="submit" value="S'inscrire">

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
    <?php } else { ?> 
        <p>inscription réussie</p>
        
    <?php } ?>
    
</body>

</html>