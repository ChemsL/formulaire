<?php
require_once '../config.php';
require_once '../models/utilisateur.php';
require_once '../models/trajet.php';
require_once '../models/entreprise.php';

// Vérifiez si l'utilisateur est connecté (par exemple, à l'aide de sessions)
session_start();
if (!isset($_SESSION['user'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: ../controllers/controller-signin.php');
    exit();
} else {
    $User_ID = $_SESSION['user']['User_ID'];
    $trajets = trajet::userTrajet($User_ID);
    $photo = $_SESSION['user']['User_Photo'];

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['delete'] === 'delete') {
        $User_ID = $_SESSION['user']['User_ID'];

        utilisateur::deleteAccount($User_ID);

        session_unset();
        session_destroy();

        header("Location: controller-signin.php");
        exit();
    }
}
include_once '../views/view-profile.php';
