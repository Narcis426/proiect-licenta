<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă o nouă carcasă
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $pozitionare_sursa = $_POST['pozitionare_sursa'];
    $lungime_video_gpu = $_POST['lungime_video_gpu'];
    $panou_lateral_transparent = $_POST['panou_lateral_transparent'];

    $sql = "INSERT INTO carcase (name, pozitionare_sursa, lungime_video_gpu, panou_lateral_transparent) VALUES ('$name', '$pozitionare_sursa', '$lungime_video_gpu', '$panou_lateral_transparent')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatecarcasele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge o carcasă
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM carcase WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatecarcasele.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate carcasele din baza de date
$sql = "SELECT * FROM carcase";
$result = $conn->query($sql);


?>

<!-- Formular pentru adăugare carcasă -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toatecarcasele.php" method="post">
                <label for="name">Nume carcasă:</label>
                <input type="text" id="name" name="name" required>
                <label for="pozitionare_sursa">Pozitionare sursă:</label>
                <input type="text" id="pozitionare_sursa" name="pozitionare_sursa" required>
                <label for="lungime_video_gpu">Lungime video GPU:</label>
                <input type="text" id="lungime_video_gpu" name="lungime_video_gpu" required>
                <label for="panou_lateral_transparent">Panou lateral transparent:</label>
                <input type="text" id="panou_lateral_transparent" name="panou_lateral_transparent" required>
                <button type="submit" name="add" class="button primary">Adaugă carcasă</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru carcase -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Pozitionare sursă</th>
      <th>Lungime video GPU</th>
      <th>Panou lateral transparent</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['pozitionare_sursa']); ?></td>
      <td><?php echo htmlspecialchars($row['lungime_video_gpu']); ?></td>
      <td><?php echo htmlspecialchars($row['panou_lateral_transparent']); ?></td>
      <td>
        <a href="editare_carcase.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toatecarcasele.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
