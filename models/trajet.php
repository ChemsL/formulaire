<?php
class trajet
{
    /**
     * Méthode pour créer un utilisateur.
     * @param string $distanceParcourue Distance parcoure
     * @param string $dateTrajet Date du trajet
     * @param string $dureeTrajet durée du trajet
     * @param string $transportType Type de transport du trajet
     * @param int $User_ID ID du l'utilisateur
     */
    public static function create(string $distanceParcourue, string $dateTrajet, string $dureeTrajet, string $transportType, int $User_ID)
    {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        };
        try {
            // Préparation de la requête SQL
            $requete = $connexion->prepare("INSERT INTO trajet (Trajet_DistanceParcourue_KM_ ,Trajet_Date, Trajet_Temps , TansportType_ID, User_ID) 
                                           VALUES (:distanceParcourue,:dateTrajet, :dureeTrajet, :transportType, :User_ID)");

            // Liaison des paramètres
            $requete->bindValue(':distanceParcourue', htmlspecialchars($distanceParcourue), PDO::PARAM_STR);
            $requete->bindValue(':dateTrajet', htmlspecialchars($dateTrajet), PDO::PARAM_STR);
            $requete->bindValue(':dureeTrajet', htmlspecialchars($dureeTrajet), PDO::PARAM_STR);
            $requete->bindValue(':transportType', $transportType, PDO::PARAM_STR);
            $requete->bindValue(':User_ID', $User_ID, PDO::PARAM_STR);



            // Exécution de la requête
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
}
?>