<?php
require_once "config/db.php";

// checkt of id bestaat
if (isset($_GET["id"])) {

    $id = $_GET["id"];

    // delete ID
    $stmt = $conn->prepare("DELETE FROM klanten WHERE id = ?");
    $stmt->execute([$id]);
}

// terug naar index
header("Location: index.php");
exit;