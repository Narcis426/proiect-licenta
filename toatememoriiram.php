<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă o nouă memorie RAM
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $capacitate = $_POST['capacitate'];
    $kit_dual_channel = $_POST['kit_dual_channel'];
    $latenta_cas = $_POST['latenta_cas'];

    $sql = "INSERT INTO memorii_ram (name, capacitate, kit_dual_channel, latenta_cas) VALUES ('$name', '$capacitate', '$kit_dual_channel', '$latenta_cas')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatememoriiram.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge o memorie RAM
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM memorii_ram WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatememoriiram.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate memoriile RAM din baza de date
$sql = "SELECT * FROM memorii_ram";
$result = $conn->query($sql);

?>


<!-- Formular pentru adăugare memorie RAM -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toatememoriiram.php" method="post">
                <label for="name">Nume:</label>
                <input type="text" id="name" name="name" required>
                <label for="capacitate">Capacitate:</label>
                <input type="text" id="capacitate" name="capacitate" required>
                <label for="kit_dual_channel">Kit Dual Channel:</label>
                <input type="text" id="kit_dual_channel" name="kit_dual_channel" required>
                <label for="latenta_cas">Latenta CAS:</label>
                <input type="text" id="latenta_cas" name="latenta_cas" required>
                <button type="submit" name="add" class="button primary">Adaugă memorie RAM</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru memorii RAM -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Capacitate</th>
      <th>Kit Dual Channel</th>
      <th>Latenta CAS</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['capacitate']); ?></td>
      <td><?php echo htmlspecialchars($row['kit_dual_channel']); ?></td>
      <td><?php echo htmlspecialchars($row['latenta_cas']); ?></td>
      <td>
        <a href="editare_memorie_ram.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toatememoriiram.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
