<?php
session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date

// Preia user ID
$IdUser = $_SESSION['user_id'];
$page = basename($_SERVER['PHP_SELF']);

// Interogare pentru meniul dinamic
$query = "SELECT pagini.Meniu, pagini.nume_meniu, pagini.pagina 
          FROM pagini 
          INNER JOIN drepturi ON drepturi.IdPage = pagini.Id 
          WHERE drepturi.IdUser = '$IdUser'";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
$sw = 0;

// Verificare acces la pagină curentă
if ($rows > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row["pagina"] == $page) {
            $sw = 1;
        }
    }
}

if ($sw == 0) {
    header("Location: logout.php");
    exit();
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narcis PC</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>



