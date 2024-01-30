<?php

class Entreprise
{




    /**
     * Méthode pour créer un utilisateur.
     * @param string $Entreprise Entreprise de l'utilisateur
     * @param int $Entreprise_ID ID entreprise
     */

    public static function getEntreprise()
    {
        // Tentative de connexion à la base de données
        try {

require_once('../config.php');

            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        ;
        $sql = "SELECT Entreprise_Nom, Entreprise_ID FROM entreprise";

        $query = $db->prepare($sql);

        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}