<?php
require_once '../config.php';
require_once '../models/utilisateur.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../controllers/controller-signin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $User_ID = $_SESSION['user']['User_ID'];

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $birthdate = $_POST['birthdate'];
    $photo = $_POST['User_Photo'];

    utilisateur::updateProfile($User_ID, $nom, $prenom, $pseudo, $birthdate);
    
    // Mettez à jour la session avec les nouvelles informations
    $_SESSION['user']['User_Nom'] = $nom;
    $_SESSION['user']['User_Prenom'] = $prenom;
    $_SESSION['user']['User_Pseudo'] = $pseudo;
    $_SESSION['user']['User_Birthdate'] = $birthdate;
    $_SESSION['user']['User_Photo'] = $photo;

    utilisateur::addPhoto($User_ID, $photo);

header('Location: controller-profile.php');
exit();
}
var_dump($_POST);
include_once '../views/view-updateprofile.php';

