<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia datele memoriei RAM
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM memorii_ram WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Memoria RAM nu a fost găsită.";
        exit();
    }
} else {
    echo "ID-ul memoriei RAM nu a fost specificat.";
    exit();
}

// Actualizează memoria RAM
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $capacitate = $_POST['capacitate'];
    $kit_dual_channel = $_POST['kit_dual_channel'];
    $latenta_cas = $_POST['latenta_cas'];

    $sql = "UPDATE memorii_ram SET name='$name', capacitate='$capacitate', kit_dual_channel='$kit_dual_channel', latenta_cas='$latenta_cas' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatememoriiram.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formular pentru editarea memoriei RAM -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_memorie_ram.php?id=<?php echo $id; ?>" method="post">
                <label for="name">Nume:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <label for="capacitate">Capacitate:</label>
                <input type="text" id="capacitate" name="capacitate" value="<?php echo htmlspecialchars($row['capacitate']); ?>" required>
                <label for="kit_dual_channel">Kit Dual Channel:</label>
                <input type="text" id="kit_dual_channel" name="kit_dual_channel" value="<?php echo htmlspecialchars($row['kit_dual_channel']); ?>" required>
                <label for="latenta_cas">Latenta CAS:</label>
                <input type="text" id="latenta_cas" name="latenta_cas" value="<?php echo htmlspecialchars($row['latenta_cas']); ?>" required>
                <button type="submit" name="update" class="button primary">Actualizează memoria RAM</button>
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
