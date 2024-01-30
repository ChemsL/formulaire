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
        <form action="" method="post">
    Pseudo <input name="pseudo" type="text" value="<?= $_SESSION['user']['User_Pseudo'] ?>"></input><br>
    Nom <input name="prenom" type="text" value="<?= $_SESSION['user']['User_Nom'] ?>"><br>
    Prénom <input name="nom" type="text" value="<?= $_SESSION['user']['User_Prenom'] ?>"><br>
    Né le <input name="birthdate" type="text" value="<?= $_SESSION['user']['User_DateDeNaissance'] ?>"><br>
    Ajouter une photo <input type="file" name="User_Photo" accept="image/*"><br>
    <input type="submit" value="Enregistrer">
    </form>
    <a href="../controllers/controller-profile.php">Retour sur le profil</a>
    </div>





    <script src="script.js">
        
        </script>
</body>

</html>