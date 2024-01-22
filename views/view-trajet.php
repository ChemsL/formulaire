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

    <form class="formTrajet" action="../controllers/controller-trajet.php" method="post" enctype="multipart/form-data">
        <label for="dateTrajet">Date du trajet:</label>
        <input type="datetime-local" id="dateTrajet" name="dateTrajet" required>

        <label for="distanceParcourue">Distance parcourue (en km):</label>
        <input type="number" step="0.10" id="distanceParcourue" name="distanceParcourue" required>

        <label for="dureeTrajet">Durée du trajet:</label>
        <input type="time" id="dureeTrajet" name="dureeTrajet" required>

        <label for="imageTrajet">Image du trajet (optionnel):</label>
        <input type="file" id="imageTrajet" name="imageTrajet" accept="image/*">

       Type de transport : <select id="transportType" name="transportType" required>
            <option value="1" <?php if (!empty($transportType) && $transportType == "1") {
                                    echo "selected";
                                } ?>>Vélo</option>
            <option value="2" <?php if (!empty($transportType) && $transportType == "2") {
                                    echo "selected";
                                } ?>>Marche</option><br>
            <option value="3" <?php if (!empty($transportType) && $transportType == "3") {
                                    echo "selected";
                                } ?>>Roller</option><br>
            <option value="4" <?php if (!empty($transportType) && $transportType == "4") {
                                    echo "selected";
                                } ?>>Skate</option><br>
            <option value="5" <?php if (!empty($transportType) && $transportType == "5") {
                                    echo "selected";
                                } ?>>Trotinette</option><br>
            <button type="submit">Ajouter</button><br>

            <input  type="submit" value="Enregistrer le trajet">
    </form>
</body>

</html>