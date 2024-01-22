<?php
require_once '../config.php';
require_once '../models/utilisateur.php';

// Démarrez la session
session_start();

// Initialiser le tableau d'erreurs
$errors = [];

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifiez si l'email est défini dans $_POST
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $motDePasse = $_POST['mot_de_passe'];

    // Vérifiez si l'email est vide
    if (empty($email)) {
        $errors['email'] = 'Veuillez saisir votre email.';
    }

    // Vérifiez si le mot de passe est vide
    if (empty($motDePasse)) {
        $errors['mot_de_passe'] = 'Veuillez saisir votre mot de passe.';
    }

    // S'il n'y a pas d'erreurs, continuez avec les vérifications
    if (empty($errors)) {
        // Vérifiez si l'email existe dans la base de données
        if (Utilisateur::checkMailExists($email)) {
            // Récupérez les informations de l'utilisateur
            $utilisateurInfos = Utilisateur::getInfos($email);

            if (password_verify($motDePasse, $utilisateurInfos['User_Password'])) {
                // Stockez les informations de l'utilisateur dans la session
                $_SESSION['user'] = $utilisateurInfos;
               

                header('Location: ../controllers/controller-home.php');
                exit();
            } else {
                $errors['connexion'] = 'Mot de passe incorrect.';
            }
        } else {
            $errors['email'] = 'Utilisateur inconnu.';
        }
    }
}

include_once '../views/view-signin.php';
?>
