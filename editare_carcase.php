<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia detaliile carcasei pentru editare
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM carcase WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Carcasa nu a fost găsită!";
        exit();
    }
}

// Actualizează detaliile carcasei
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pozitionare_sursa = $_POST['pozitionare_sursa'];
    $lungime_video_gpu = $_POST['lungime_video_gpu'];
    $panou_lateral_transparent = $_POST['panou_lateral_transparent'];

    $sql = "UPDATE carcase SET name='$name', pozitionare_sursa='$pozitionare_sursa', lungime_video_gpu='$lungime_video_gpu', panou_lateral_transparent='$panou_lateral_transparent' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatecarcasele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formular pentru editare carcasă -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_carcase.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Nume carcasă:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <label for="pozitionare_sursa">Pozitionare sursă:</label>
                <input type="text" id="pozitionare_sursa" name="pozitionare_sursa" value="<?php echo htmlspecialchars($row['pozitionare_sursa']); ?>" required>
                <label for="lungime_video_gpu">Lungime video GPU:</label>
                <input type="text" id="lungime_video_gpu" name="lungime_video_gpu" value="<?php echo htmlspecialchars($row['lungime_video_gpu']); ?>" required>
                <label for="panou_lateral_transparent">Panou lateral transparent:</label>
                <input type="text" id="panou_lateral_transparent" name="panou_lateral_transparent" value="<?php echo htmlspecialchars($row['panou_lateral_transparent']); ?>" required>
                <button type="submit" name="update" class="button primary">Actualizează carcasă</button>
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
