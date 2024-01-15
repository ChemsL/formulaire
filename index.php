<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Inscription fictive</title>
</head>
<body>
<?php
// Paramètres de connexion à la base de données
$dsn = "mysql:host=localhost;dbname=mbd";
$utilisateur = "chems";
$motDePasse = "chems";

// Tentative de connexion à la base de données
try {
    $connexion = new PDO($dsn, $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérification du formulaire soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $motDePasse = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT); // Hashage du mot de passe

    try {
        // Préparation de la requête SQL
        $requete = $connexion->prepare("INSERT INTO utilisateur (User_Nom, User_Prenom, User_Pseudo, User_DateDeNaissance, User_Mail, User_Password) 
                                       VALUES (:nom, :prenom, :pseudo, :birthdate, :email, :motDePasse)");

        // Liaison des paramètres
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':pseudo', $pseudo);
        $requete->bindParam(':birthdate', $birthdate);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':motDePasse', $motDePasse);

        // Exécution de la requête
        $requete->execute();

        echo "Inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}

// Fermeture de la connexion
$connexion = null;
?>

<h2>SIGN UP</h2>

<form action="/reponse.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" value="<?php if (!empty($nom)){echo $nom;}?>" required><br>

    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom" value="<?php if (!empty($prenom)){echo $prenom;}?>" required><br>

    <label for="pseudo">Pseudo :</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php if (!empty($pseudo)){echo $pseudo;}?>" required><br>


    <label for="birthdate">Date de naissance :</label><br>
    <input type="date" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)){echo $birthdate;}?>" required><br>

    <label for="email">Email :</label><br>
    <input type="email" id="email" name="email" value="<?php if (!empty($email)){echo $email;}?>"  required><br>

    <label for="mot_de_passe">Mot de passe :</label><br>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <label for="entreprise">Entreprise :</label><br>
            <select id="entreprise" name="entreprise" required>
                <option value="1" <?php if (!empty($entreprise) && $entreprise == "1") { echo "selected"; } ?>>Wiko</option>
                <option value="2" <?php if (!empty($entreprise) && $entreprise == "2") { echo "selected"; } ?>>Umbro</option><br>

                <label for="cgu">Accepter les CGU :</label>
            <input type="checkbox" id="cgu" name="cgu" required><br>
            <label for="cgu">J'ai lu et j'accepte les CGU.</label><br>

    


<br>
    <input class="submit" type="submit" value="S'inscrire">
</form>

</body>
</html>