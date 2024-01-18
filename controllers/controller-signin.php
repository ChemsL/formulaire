<?php
require_once '../config.php';
require_once '../models/utilisateur.php';

// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];

    if (empty($_POST['email'])) {
        $errors['email'] = 'Veuillez saisir votre Email';
    }

    if (empty($_POST['mot_de_passe'])) {
        $errors['mot_de_passe'] = 'Veuillez saisir votre mot de passe';
    }

    if (empty($errors)) {
        // ici commence les tests
        if (!Utilisateur::checkMailExists($_POST['email'])) {
            $errors['email'] = 'Utilisateur Inconnu';
        } else {
            // je recupère toutes les infos via la méthode getInfos()
            $utilisateurInfos = Utilisateur::getInfos($_POST['email']);
            // Utilisation de password_verify pour valider le mdp
            if (password_verify($_POST['mot_de_passe'], $utilisateurInfos['User_Password'])) {
                header('Location: ../view-home.php');
            } else {
                $errors['connexion'] = 'Mauvais mdp';
            }
        }
    }
}

include_once ('../views/view-signin.php');
?>
