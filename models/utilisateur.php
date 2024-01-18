<?php
 class utilisateur
{
    /**
     * Méthode pour créer un utilisateur.
     * @param string $nom Nom de l'utilisateur
     * @param string $prenom Prénom de l'utilisateur
     * @param string $pseudo Pseudo de l'utilisateur
     * @param string $birthdate Date de naissance de l'utilisateur
     * @param string $email Adresse mail de l'utilisateur
     * @param string $motDePasse Mot de passe de l'utilisateur
     * @param string $entreprise Entreprise de l'utilisateur
     */
    public static function create(string $nom, string $prenom, string $pseudo, string $birthdate, string $email, string $motDePasse, string $entreprise)
    {


        // Tentative de connexion à la base de données
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        };


        // Vérification du formulaire soumis
        // Récupération des données du formulaire


        try {
            // Préparation de la requête SQL
            $requete = $connexion->prepare("INSERT INTO utilisateur (User_Nom, User_Prenom, User_Pseudo, User_DateDeNaissance, User_Mail, User_Password, Entreprise_ID) 
                                           VALUES (:nom, :prenom, :pseudo, :birthdate, :email, :motDePasse, :entreprise)");

            // Liaison des paramètres
            $requete->bindValue(':nom', htmlspecialchars($nom), PDO::PARAM_STR);
            $requete->bindValue(':prenom', htmlspecialchars($prenom), PDO::PARAM_STR);
            $requete->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $requete->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
            $requete->bindValue(':email', $email, PDO::PARAM_STR);
            $requete->bindValue(':motDePasse', password_hash($motDePasse, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $requete->bindValue(':entreprise', $entreprise, PDO::PARAM_STR);


            // Exécution de la requête
            $requete->execute();
            header("Location: /inscription-reussie.php?prenom=" . urlencode($prenom));
            exit();
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
/**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return bool
     */
    public static function checkMailExists(string $email): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `utilisateur` WHERE `User_Mail` = :email";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':email', $email, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
     /**
     * Méthode pour récupérer le mot de passe d'un utilisateur par son email.
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return string|false Retourne le mot de passe si l'utilisateur est trouvé, sinon false.
     */
    public static function getPasswordByEmail(string $email)
    {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = $connexion->prepare("SELECT User_Password FROM utilisateur WHERE User_Mail = :email");
            $requete->bindValue(':email', $email, PDO::PARAM_STR);
            $requete->execute();

            $resultat = $requete->fetch(PDO::FETCH_ASSOC);

            return ($resultat !== false) ? $resultat['User_Password'] : false;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

}
