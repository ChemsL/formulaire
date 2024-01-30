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

<div class="bodyConnect">

<h1>SE CONNECTER</h1>
<a href="../controllers/controller-signup.php" class="btnInscription">S'inscrire</a>
    

    <form action="../controllers/controller-signin.php" method="post" novalidate>
        <label for="email">Adresse mail :</label><br>
        <input type="text" id="email" name="email" value="<?= $_POST['email']?? ''?>" required> <span><?= $errors['email'] ?? '' ?></span><br>
        <label for="mot_de_passe">Mot de passe :</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><span><?= $errors['mot_de_passe'] ?? '' ?></span><br>
<p><?= $errors['connexion'] ?? '' ?></p>
        <input class="submit" type="submit" value="Se connecter">

    </form>

    </div>

    <script src="script.js">
        
    </script>
</body>

</html>