<?php
require_once '../config.php';
require_once '../models/utilisateur.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le champ "email" est défini dans $_POST
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $motDePasseSaisi = $_POST["mot_de_passe"];

    // Vérification si l'adresse e-mail existe
    if ($email !== null && utilisateur::checkMailExists($email)) {
        // recup mdp database 
        $motDePasseStocke = utilisateur::getPasswordByEmail($email);

        // comparaison mots de passes
        if (password_verify($motDePasseSaisi, $motDePasseStocke)) {
            // Mot de passe  ok
            echo "Mot de passe correct. Vous êtes connecté !";
        } else {
            $erreurs[] = "Mot de passe incorrect.";
        }
    } else {
        $erreurs[] = "Adresse e-mail invalide.";
    }
    var_dump($motDePasseSaisi);
var_dump($motDePasseStocke);
}

include_once ('../views/view-signin.php');
?>
