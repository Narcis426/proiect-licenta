<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă un nou produs de stocare
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $interfata = $_POST['interfata'];
    $dimensiuni = $_POST['dimensiuni'];
    $viteza_de_transfer = $_POST['viteza_de_transfer'];

    $sql = "INSERT INTO stocare (name, interfata, dimensiuni, viteza_de_transfer) VALUES ('$name', '$interfata', '$dimensiuni', '$viteza_de_transfer')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatestocarea.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge un produs de stocare
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM stocare WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatestocarea.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate produsele de stocare din baza de date
$sql = "SELECT * FROM stocare";
$result = $conn->query($sql);

?>



<!-- Formular pentru adăugare produs de stocare -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toatestocarea.php" method="post">
                <label for="name">Nume produs:</label>
                <input type="text" id="name" name="name" required>
                <label for="interfata">Interfață:</label>
                <input type="text" id="interfata" name="interfata" required>
                <label for="dimensiuni">Dimensiuni:</label>
                <input type="text" id="dimensiuni" name="dimensiuni" required>
                <label for="viteza_de_transfer">Viteză de transfer:</label>
                <input type="text" id="viteza_de_transfer" name="viteza_de_transfer" required>
                <button type="submit" name="add" class="button primary">Adaugă produs</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru produse de stocare -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Interfață</th>
      <th>Dimensiuni</th>
      <th>Viteză de transfer</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['interfata']); ?></td>
      <td><?php echo htmlspecialchars($row['dimensiuni']); ?></td>
      <td><?php echo htmlspecialchars($row['viteza_de_transfer']); ?></td>
      <td>
        <a href="editare_stocare.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toatestocarea.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
