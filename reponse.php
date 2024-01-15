<?php

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $motDePasse = $_POST["mot_de_passe"];
    $cguChecked = isset($_POST["cgu"]) && $_POST["cgu"] === "on";


    $erreurs = array();

    if (empty($nom) || !preg_match("/^[a-zA-Z]+$/", $nom)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le nom est vide ou contient des caractères non autorisés.";
    }


    if (empty($prenom) || !preg_match("/^[a-zA-Z]+$/", $prenom)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le prénom est vide ou contient des caractères non autorisés.";
    }

    if (empty($pseudo) || strlen($pseudo) < 4) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le pseudo est vide ou ne contient pas assez de caractères (minimum 4).";
    }


    if (empty($birthdate)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Merci de bien vouloir renseigner votre date de naissance.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "L'adresse email n'est pas valide.";
    }

    if (empty($motDePasse) || strlen($motDePasse) < 8) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le mot de passe doit avoir au moins 8 caractères.";
    }

    if (!$cguChecked) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Veuillez accepter les CGU pour continuer.";
    }

    // Si aucune erreur, procéder à l'inscription
//     
//         
//     
 }
if (empty($erreurs)){
    // Paramètres de connexion à la base de données
    $dsn = "mysql:host=localhost;dbname=mbd";
    $utilisateur = "chems";
    $motDePasse = "chems";
    
    // Tentative de connexion à la base de données
    try {
        $connexion = new PDO("mysql:host=localhost;" . DBNAME, USERPSEUDO, USERPASSWORD);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    };
    
    
    // Vérification du formulaire soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $pseudo = $_POST["pseudo"];
        $birthdate = $_POST["birthdate"];
        $email = $_POST["email"];
        $motDePasse = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT); // Hashage du mot de passe
        $entreprise = $_POST["entreprise"];
    
        try {
            // Préparation de la requête SQL
            $requete = $connexion->prepare("INSERT INTO utilisateur (User_Nom, User_Prenom, User_Pseudo, User_DateDeNaissance, User_Mail, User_Password, Entreprise_ID) 
                                           VALUES (:nom, :prenom, :pseudo, :birthdate, :email, :motDePasse, :entreprise)");
    
            // Liaison des paramètres
            $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
            $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $requete->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
            $requete->bindParam(':email', $email, PDO::PARAM_STR);
            $requete->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
            $requete->bindParam(':entreprise', $entreprise, PDO::PARAM_STR);

    
            // Exécution de la requête
            $requete->execute();
    
            echo "Inscription réussie !";
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
    
    // Fermeture de la connexion
    $connexion = null;
    // Redirection après l'inscription réussie avec le paramètre de prénom
        header("Location: /inscription-reussie.php?prenom=" . urlencode($prenom));
       exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Inscription</title>
</head>

<body>

    <h2>SIGN UP</h2>

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
    
        <form action="/reponse.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
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
                <option value="1" <?php if (!empty($entreprise) && $entreprise == "1") { echo "selected"; } ?>>Wiko</option>
                <option value="2" <?php if (!empty($entreprise) && $entreprise == "2") { echo "selected"; } ?>>Umbro</option><br>


                <label for="cgu">Accepter les CGU :</label>
            <input type="checkbox" id="cgu" name="cgu" required>
            <label for="cgu">J'ai lu et j'accepte les CGU.</label><br>

            </span>
            <input class="submit" type="submit" value="S'inscrire">
        </form>
   
</body>

</html>