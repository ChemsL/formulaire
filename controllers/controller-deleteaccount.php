<?php
require_once '../config.php';
require_once '../models/utilisateur.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['delete'] === 'delete') {
        $User_ID = $_SESSION['user']['User_ID'];
        
        utilisateur::deleteAccount($User_ID);

        session_unset();
        session_destroy();

        header("Location: ../controllers/controller-signin.php");
        exit();
    }
}

