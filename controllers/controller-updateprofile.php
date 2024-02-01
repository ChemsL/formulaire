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
  $photo = $_FILES['User_Photo']['name'];
  var_dump($_FILES);
  utilisateur::updateProfile($User_ID, $nom, $prenom, $pseudo, $birthdate, $photo);

  if (!empty($_FILES['User_Photo']['name'])) {

  $target_dir = "../assets/img/";
  $target_file = $target_dir . basename($_FILES["User_Photo"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["User_Photo"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["User_Photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["User_Photo"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["User_Photo"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  } else {
    $photo = $_SESSION['user']['User_Photo'];

  }

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

