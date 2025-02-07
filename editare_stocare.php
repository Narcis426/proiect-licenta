<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia detaliile produsului de stocare pentru editare
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM stocare WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Produsul nu a fost găsit!";
        exit();
    }
}

// Actualizează detaliile produsului de stocare
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $interfata = $_POST['interfata'];
    $dimensiuni = $_POST['dimensiuni'];
    $viteza_de_transfer = $_POST['viteza_de_transfer'];

    $sql = "UPDATE stocare SET name='$name', interfata='$interfata', dimensiuni='$dimensiuni', viteza_de_transfer='$viteza_de_transfer' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatestocarea.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formular pentru editare produs de stocare -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_stocare.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Nume produs:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <label for="interfata">Interfață:</label>
                <input type="text" id="interfata" name="interfata" value="<?php echo htmlspecialchars($row['interfata']); ?>" required>
                <label for="dimensiuni">Dimensiuni:</label>
                <input type="text" id="dimensiuni" name="dimensiuni" value="<?php echo htmlspecialchars($row['dimensiuni']); ?>" required>
                <label for="viteza_de_transfer">Viteză de transfer:</label>
                <input type="text" id="viteza_de_transfer" name="viteza_de_transfer" value="<?php echo htmlspecialchars($row['viteza_de_transfer']); ?>" required>
                <button type="submit" name="update" class="button primary">Actualizează produs</button>
            </form>
        </div>
    </div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>

<?php
$conn->close();
?>
