<?php
session_start();
include('db.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $sql = "DELETE FROM users WHERE username = ?";
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            header("location: useri.php");
            exit();
        } else {
            echo "Eroare la ștergerea utilizatorului.";
        }
        $stmt->close();
    }
}
$link->close();
?>
