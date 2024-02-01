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
<?php include_once('../assets/header.php') ?>


<div class="infoTrajets flex justify-center items-center flex-col">

<h1 class="text-2xl mb-6" >Historique des trajets</h1>

        <?php
        foreach ($trajets as $trajet) {
            echo "<p>Date du trajet: " . $trajet['Trajet_Date'] . "</p>";
            echo "<p>Distance parcourue: " . $trajet['Trajet_DistanceParcourue_KM_'] . " km</p>";
            echo "<p>Durée du trajet: " . $trajet['Trajet_Temps'] . "</p>";
            echo "<p>Type de transport: " . $trajet['TransportType_Name'] . "</p>";?>
            <form class="flex items-center justify-center bg-red-700 text-white p-4 rounded-md border border-white cursor-pointer mb-4 mt-4 w-1/3" action="" method="post">
                <input type="hidden" name="Trajet_ID" value="<?= $trajet['Trajet_ID']?>">
                <input type="submit" name="delete" value="Supprimer le trajet" onclick="return confirmDelete()" >
                
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