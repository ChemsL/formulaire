<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Mon profile</title>
</head>

<body>
    <a href="../controllers/controller-home.php">Home</a>

    <div class="infoProfile">
    <?= $_SESSION['user']['User_Pseudo'] ?><br>
    <?= $_SESSION['user']['User_Nom'] ?><br>
    <?= $_SESSION['user']['User_Prenom'] ?><br>
    Né le <?= $_SESSION['user']['User_DateDeNaissance'] ?><br>
    </div>
</body>

</html>