<?php
require_once '../config.php';
require_once '../models/trajet.php';


session_start();

$distanceParcourue = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distanceParcourue = $_POST["distanceParcourue"];
    $dateTrajet = $_POST["dateTrajet"];
    $dureeTrajet = $_POST["dureeTrajet"];
    $transportType = $_POST["transportType"];



    if (isset($_SESSION['user'])) {
        $User_ID = $_SESSION['user']['User_ID'];
    }
    
    trajet::create($distanceParcourue,$dateTrajet,$dureeTrajet,$transportType,$User_ID);
}




include_once '../views/view-trajet.php';
?>