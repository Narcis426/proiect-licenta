<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă un nou produs
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $pret = $_POST['pret'];
    $descriere = $_POST['descriere'];

    // Încarcă imaginea
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $image_url = $target_file;

    $sql = "INSERT INTO produse (name, image_url, pret, descriere) VALUES ('$name', '$image_url', '$pret', '$descriere')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateprodusele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge un produs
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM produse WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateprodusele.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate produsele din baza de date
$sql = "SELECT * FROM produse";
$result = $conn->query($sql);
?>


<!-- Formular pentru adăugare produs -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toateprodusele.php" method="post" enctype="multipart/form-data">
                <label for="name">Nume produs:</label>
                <input type="text" id="name" name="name" required>
                <label for="image">Imagine:</label>
                <input type="file" id="image" name="image" required>
                <label for="pret">Preț:</label>
                <input type="text" id="pret" name="pret" required>
                <label for="descriere">Descriere:</label>
                <textarea id="descriere" name="descriere" required></textarea>
                <button type="submit" name="add" class="button primary">Adaugă produs</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru produse -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Imagine</th>
      <th>Preț</th>
      <th>Descriere</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" style="width:100px;height:auto;"></td>
      <td><?php echo htmlspecialchars($row['pret']); ?> Lei</td>
      <td><?php echo htmlspecialchars($row['descriere']); ?></td>
      <td>
        <a href="editare_produs.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toateprodusele.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>

<?php
$conn->close();
?>
