<?php
require_once '../config.php';
require_once '../models/utilisateur.php';
require_once '../models/trajet.php';


// Vérifiez si l'utilisateur est connecté (par exemple, à l'aide de sessions)
session_start();

if (!isset($_SESSION['user'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: ../controllers/controller-signin.php');
    exit();
}
elseif (isset($_SESSION['user'])){
    $User_ID = $_SESSION['user']['User_ID'];
    $trajets = trajet::userTrajet($User_ID);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['delete'] === 'delete') {

       trajet::delete($_POST["Trajet_ID"]);

       header("Location: ../controllers/controller-historique.php");
    }
}


include_once '../views/view-historique.php';
?>