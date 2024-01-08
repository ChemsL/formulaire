<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $motDePasse = $_POST["mot_de_passe"];

    $erreurs = array();

    if (empty($nom) || !preg_match("/^[a-zA-Z]+$/", $nom)) {
        $erreurs[] = "Le nom est vide ou contient des caractères non autorisés.";
    }
    

    if (empty($prenom) || !preg_match("/^[a-zA-Z]+$/", $prenom)) {
        $erreurs[] = "Le prénom est vide ou contient des caractères non autorisés.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email n'est pas valide.";
    }

    if (empty($motDePasse) || strlen($motDePasse) < 8) {
        $erreurs[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

    // Si aucune erreur, procéder à l'inscription
    if (empty($erreurs)) {

        header("Location: /inscription-reussie.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Inscription</title>
</head>
<body>

<h2>Inscription</h2>

<?php
// Affichage des erreurs s'il y en a
if (!empty($erreurs)) {
    echo "<div style='color: red;'>";
    foreach ($erreurs as $erreur) {
        echo "<p>$erreur</p>";
    }
    echo "</div>";
    $nom ;
}
?>

<form action="/reponse.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php if (!empty($nom)){echo $nom;}?>" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?php if (!empty($prenom)){echo $prenom;}?>" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?php if (!empty($email)){echo $email;}?>" required><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <input class="submit" type="submit" value="S'inscrire">
</form>

</body>
</html>
