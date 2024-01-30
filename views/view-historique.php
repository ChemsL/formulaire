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


<div class="infoTrajets">

<h2>Historique des trajets</h2>
        <?php
        foreach ($trajets as $trajet) {
            echo "<p>Date du trajet: " . $trajet['Trajet_Date'] . "</p>";
            echo "<p>Distance parcourue: " . $trajet['Trajet_DistanceParcourue_KM_'] . " km</p>";
            echo "<p>Durée du trajet: " . $trajet['Trajet_Temps'] . "</p>";
            echo "<p>Type de transport: " . $trajet['TransportType_Name'] . "</p>";?>
            <form action="" method="post">
                <input type="hidden" name="Trajet_ID" value="<?= $trajet['Trajet_ID']?>">
                <input type="submit" name="delete" value="delete" onclick="return confirmDelete()" >
            </form>
           <?php echo "<hr>";
        }
        ?>

</div>
<script>
        function confirmDelete() {
        // Affiche une boîte de dialogue pour demander confirmation
        var result = confirm('Voulez-vous réellement supprimer ce trajet ?');

        // Si l'utilisateur clique sur "OK", le formulaire sera soumis
        // Sinon, le formulaire ne sera pas soumis
        return result;
    }
    </script>
</body>

</html>