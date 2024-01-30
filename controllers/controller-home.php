<?php

session_start();

require_once '../config.php';
require_once '../models/utilisateur.php';

// Vérifiez si l'utilisateur est connecté (par exemple, à l'aide de sessions)


if (!isset($_SESSION['user'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: ../controllers/controller-signin.php');
    exit();
}
elseif (isset($_SESSION['user'])) {
    $pseudo = $_SESSION['user']['User_Pseudo'];
    $photo = $_SESSION['user']['User_Photo'];
}

include_once '../views/view-home.php';
