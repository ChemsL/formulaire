<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription fictive</title>
</head>
<body>

<h2>Inscription</h2>

<form action="/reponse.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php if (!empty($nom)){echo $nom;}?>" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?php if (!empty($prenom)){echo $prenom;}?>" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?php if (!empty($email)){echo $email;}?>"  required><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <input class="submit" type="submit" value="S'inscrire">
</form>

</body>
</html>