<?php
require_once "config/db.php";

$message = "";

// formulier verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $woonplaats = $_POST["woonplaats"];

    // controle
    if (!empty($naam) && !empty($adres) && !empty($woonplaats)) {

        $stmt = $conn->prepare("
            INSERT INTO klanten (naam, adres, woonplaats)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([$naam, $adres, $woonplaats]);

        // terug naar to index
        header("Location: index.php");
        exit;

    } else {
        $message = "Vul alle velden in!";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant toevoegen</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>➕ Nieuwe klant toevoegen</h1>

    <!-- error message -->
    <?php if ($message): ?>
        <div class="alert alert-danger">
            <?= $message; ?>
        </div>
    <?php endif; ?>

    <!-- formulier -->
    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Naam</label>
            <input type="text" name="naam" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Adres</label>
            <input type="text" name="adres" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Woonplaats</label>
            <input type="text" name="woonplaats" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Opslaan
        </button>

        <a href="index.php" class="btn btn-secondary">
            Terug
        </a>

    </form>

</div>

</body>
</html>