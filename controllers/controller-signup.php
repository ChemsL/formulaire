<?php

require_once '../config.php';
require_once '../models/utilisateur.php';
require_once '../models/entreprise.php';

$showform = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
var_dump($_POST);

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $motDePasse = $_POST["mot_de_passe"];
    $cguChecked = isset($_POST["cgu"]) && $_POST["cgu"] === "on";


    $erreurs = array();

    if (empty($nom) || !preg_match("/^[a-zA-Z]+$/", $nom)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le nom est vide ou contient des caractères non autorisés.";
    }


    if (empty($prenom) || !preg_match("/^[a-zA-Z]+$/", $prenom)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le prénom est vide ou contient des caractères non autorisés.";
    }

    if (empty($pseudo) || strlen($pseudo) < 4) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le pseudo est vide ou ne contient pas assez de caractères (minimum 4).";
    }


    if (empty($birthdate)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Merci de bien vouloir renseigner votre date de naissance.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "L'adresse email n'est pas valide.";
    }

    if (empty($motDePasse) || strlen($motDePasse) < 8) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Le mot de passe doit avoir au moins 8 caractères.";
    }
    $motDePasseConfirmation = $_POST["mot_de_passe_confirmation"];

    if (empty($motDePasseConfirmation) || $motDePasseConfirmation !== $motDePasse) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "La confirmation du mot de passe ne correspond pas.";
    }

    if (!$cguChecked) {
        $erreurs[] = '<i class="bi bi-exclamation-triangle-fill"></i>' . "Veuillez accepter les CGU pour continuer.";
    }

    if (empty($erreurs)) {
        $Entreprise = Entreprise::getEntreprise();
        // Si aucune erreur, procéder à l'inscription
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $motDePasse = $_POST['mot_de_passe'];
        $entreprise = $_POST['entreprise'];

        utilisateur::create($nom, $prenom, $pseudo, $birthdate, $email, $motDePasse, $entreprise);
        $showform = false;


    }
}
?>

<?php include '../views/view-signup.php' ?>