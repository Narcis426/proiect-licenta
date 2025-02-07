<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia datele plăcii video
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM placi_video WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Placa video nu a fost găsită.";
        exit();
    }
} else {
    echo "ID-ul plăcii video nu a fost specificat.";
    exit();
}

// Actualizează placa video
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $procesor_video = $_POST['procesor_video'];
    $producator_chipset = $_POST['producator_chipset'];
    $capacitate_memorie = $_POST['capacitate_memorie'];

    $sql = "UPDATE placi_video SET name='$name', procesor_video='$procesor_video', producator_chipset='$producator_chipset', capacitate_memorie='$capacitate_memorie' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateplacivideo.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formular pentru editarea plăcii video -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_placa_video.php?id=<?php echo $id; ?>" method="post">
                <label for="name">Nume placă video:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <label for="procesor_video">Procesor video:</label>
                <input type="text" id="procesor_video" name="procesor_video" value="<?php echo htmlspecialchars($row['procesor_video']); ?>" required>
                <label for="producator_chipset">Producător chipset:</label>
                <input type="text" id="producator_chipset" name="producator_chipset" value="<?php echo htmlspecialchars($row['producator_chipset']); ?>" required>
                <label for="capacitate_memorie">Capacitate memorie:</label>
                <input type="text" id="capacitate_memorie" name="capacitate_memorie" value="<?php echo htmlspecialchars($row['capacitate_memorie']); ?>" required>
                <button type="submit" name="update" class="button primary">Actualizează placa video</button>
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
