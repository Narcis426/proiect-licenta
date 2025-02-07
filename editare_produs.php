<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Preia detaliile produsului
$id = $_GET['id'];
$sql = "SELECT * FROM produse WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

// Actualizează detaliile produsului
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $pret = $_POST['pret'];
    $descriere = $_POST['descriere'];

    // Verifică dacă a fost selectată o nouă imagine
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_url = $target_file;
    } else {
        $image_url = $product['image_url'];
    }

    $sql = "UPDATE produse SET name='$name', image_url='$image_url', pret='$pret', descriere='$descriere' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateprodusele.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}
?>

<!-- Formular pentru editare produs -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="editare_produs.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <label for="name">Nume produs:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                <label for="image">Imagine:</label>
                <input type="file" id="image" name="image">
                <label for="pret">Preț:</label>
                <input type="text" id="pret" name="pret" value="<?php echo htmlspecialchars($product['pret']); ?>" required>
                <label for="descriere">Descriere:</label>
                <textarea id="descriere" name="descriere" required><?php echo htmlspecialchars($product['descriere']); ?></textarea>
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
