<?php
session_start();
include('db.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $sql = "DELETE FROM clients WHERE username = ?";
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            header("location: clienti.php");
            exit();
        } else {
            echo "Eroare la ștergerea clientului.";
        }
        $stmt->close();
    }
}
$link->close();
?>
