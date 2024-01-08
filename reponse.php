<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $dateNaissance = $_POST["date_naissance"];
    $motDePasse = $_POST["mot_de_passe"];
    $motDePasseConfirmation = $_POST["mot_de_passe_confirmation"];

    // Vérifications
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

    if (empty($dateNaissance)) {
        $erreurs[] = "La date de naissance est obligatoire.";
    }

    if (empty($motDePasse) || strlen($motDePasse) < 8 || $motDePasse !== $motDePasseConfirmation) {
        $erreurs[] = "Le mot de passe doit avoir au moins 8 caractères et les deux champs de mot de passe doivent correspondre.";
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
    <title>Inscription fictive</title>
</head>
<body>

<h2>Inscription</h2>

<?php
if (!empty($erreurs)) {
    echo "<div style='color: red;'>";
    foreach ($erreurs as $erreur) {
        echo "<p>$erreur</p>";
    }
    echo "</div>";
}
?>

<form action="/reponse.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="date_naissance">Date de naissance :</label>
    <input type="date" id="date_naissance" name="date_naissance" required><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <label for="mot_de_passe_confirmation">Confirmer le mot de passe :</label>
    <input type="password" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required><br>

    <input type="submit" value="S'inscrire">
</form>

</body>
</html>
