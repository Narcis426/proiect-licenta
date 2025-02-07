<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia detaliile sursei pentru editare
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM surse WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Sursa nu a fost găsită!";
        exit();
    }
}

// Actualizează detaliile sursei
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $putere_sursa = $_POST['putere_sursa'];
    $sistem_de_racire = $_POST['sistem_de_racire'];
    $certificare = $_POST['certificare'];

    $sql = "UPDATE surse SET name='$name', putere_sursa='$putere_sursa', sistem_de_racire='$sistem_de_racire', certificare='$certificare' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatesursele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formular pentru editare sursă -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_surse.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Nume sursă:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <label for="putere_sursa">Putere sursă:</label>
                <input type="text" id="putere_sursa" name="putere_sursa" value="<?php echo htmlspecialchars($row['putere_sursa']); ?>" required>
                <label for="sistem_de_racire">Sistem de răcire:</label>
                <input type="text" id="sistem_de_racire" name="sistem_de_racire" value="<?php echo htmlspecialchars($row['sistem_de_racire']); ?>" required>
                <label for="certificare">Certificare:</label>
                <input type="text" id="certificare" name="certificare" value="<?php echo htmlspecialchars($row['certificare']); ?>" required>
                <button type="submit" name="update" class="button primary">Actualizează sursă</button>
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
