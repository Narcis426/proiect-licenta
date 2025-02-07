<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă un nou producător
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO producatori (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        // Redirecționează pentru a preveni re-adăugarea producătorului la refresh
        header("Location: producatori.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge un producător
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM producatori WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Redirecționează pentru a preveni afișarea mesajului de ștergere
        header("Location: producatori.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toți producătorii din baza de date
$sql = "SELECT * FROM producatori";
$result = $conn->query($sql);

?>

<!-- Formular pentru adăugare producător -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="producatori.php" method="post">
                <label for="name">Nume Producător:</label>
                <input type="text" id="name" name="name" required>
                <button type="submit" name="add" class="button primary">Adaugă producător</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru producători -->
<table>
  <thead>
    <tr>
      <th>Producători</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td>
        <a href="editare_producatori.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="producatori.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
