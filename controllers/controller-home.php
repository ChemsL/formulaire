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

include_once '../views/view-home.php';
?>
