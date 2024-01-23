<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Home</title>
</head>
<body>
<a href="../controllers/controller-signin.php">Déconnexion</a>

    <p class="date"><?php
$dateDuJour = date("d-m-Y");

echo "Date du jour : " . $dateDuJour;
?>
   </p>



   <img class="randompp"src="../assets/img/randompp.jpg" alt="Profile picture">


<div class="mainHome">

Bienvenue <?= $_SESSION['user']['User_Pseudo'] ?>


</div>

<a href="../controllers/controller-trajet.php" class="addTrajet">Ajouter un trajet</a>

<a class="profilBtn" href="../controllers/controller-profile.php"><i class="bi bi-person-circle"></i> MON PROFIL</a>
    
</body>
</html>