<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>Inscription réussie</title>
</head>
<body>
    <h1>Inscription réussie</h1>

    <?php
    // Récupérer le prénom depuis l'URL
    $prenom = isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : 'Utilisateur';
    ?>

    <h2>Bienvenue <?php echo $prenom; ?></h2>
</body>
</html>
