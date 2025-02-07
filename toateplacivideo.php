<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă o nouă placă video
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $procesor_video = $_POST['procesor_video'];
    $producator_chipset = $_POST['producator_chipset'];
    $capacitate_memorie = $_POST['capacitate_memorie'];

    $sql = "INSERT INTO placi_video (name, procesor_video, producator_chipset, capacitate_memorie) VALUES ('$name', '$procesor_video', '$producator_chipset', '$capacitate_memorie')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateplacivideo.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge o placă video
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM placi_video WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateplacivideo.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate plăcile video din baza de date
$sql = "SELECT * FROM placi_video";
$result = $conn->query($sql);

?>


<!-- Formular pentru adăugare placă video -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toateplacivideo.php" method="post">
                <label for="name">Nume placă video:</label>
                <input type="text" id="name" name="name" required>
                <label for="procesor_video">Procesor video:</label>
                <input type="text" id="procesor_video" name="procesor_video" required>
                <label for="producator_chipset">Producător chipset:</label>
                <input type="text" id="producator_chipset" name="producator_chipset" required>
                <label for="capacitate_memorie">Capacitate memorie:</label>
                <input type="text" id="capacitate_memorie" name="capacitate_memorie" required>
                <button type="submit" name="add" class="button primary">Adaugă placă video</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru plăci video -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Procesor video</th>
      <th>Producător chipset</th>
      <th>Capacitate memorie</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['procesor_video']); ?></td>
      <td><?php echo htmlspecialchars($row['producator_chipset']); ?></td>
      <td><?php echo htmlspecialchars($row['capacitate_memorie']); ?></td>
      <td>
        <a href="editare_placa_video.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toateplacivideo.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
