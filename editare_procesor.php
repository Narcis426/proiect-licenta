<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia datele procesorului
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM procesoare WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Procesorul nu a fost găsit.";
        exit();
    }
} else {
    echo "ID-ul procesorului nu a fost specificat.";
    exit();
}

// Actualizează procesorul
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $frecventa = $_POST['frecventa'];
    $memorie_maxima = $_POST['memorie_maxima'];
    $suport = $_POST['suport'];
    $tip = $_POST['tip'];
    $tip_procesor = $_POST['tip_procesor']; 

    $sql = "UPDATE procesoare SET name='$name', frecventa='$frecventa', memorie_maxima='$memorie_maxima', suport='$suport', tip='$tip', tip_procesor='$tip_procesor' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateprocesoarele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formular pentru editarea procesorului -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_procesor.php?id=<?php echo $id; ?>" method="post">
                <label for="name">Nume procesor:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <label for="frecventa">Frecvență:</label>
                <input type="text" id="frecventa" name="frecventa" value="<?php echo htmlspecialchars($row['frecventa']); ?>" required>
                <label for="memorie_maxima">Memorie maximă:</label>
                <input type="text" id="memorie_maxima" name="memorie_maxima" value="<?php echo htmlspecialchars($row['memorie_maxima']); ?>" required>
                <label for="suport">Suport:</label>
                <input type="text" id="suport" name="suport" value="<?php echo htmlspecialchars($row['suport']); ?>" required>
                <label for="tip">Tip:</label>
                <input type="text" id="tip" name="tip" value="<?php echo htmlspecialchars($row['tip']); ?>" required>
                <label for="tip_procesor">Tip procesor:</label>
                <select id="tip_procesor" name="tip_procesor" required>
                    <option value="Intel" <?php echo ($row['tip_procesor'] == 'Intel') ? 'selected' : ''; ?>>Intel</option>
                    <option value="AMD" <?php echo ($row['tip_procesor'] == 'AMD') ? 'selected' : ''; ?>>AMD</option>
                </select>
                <button type="submit" name="update" class="button primary">Actualizează procesor</button>
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
