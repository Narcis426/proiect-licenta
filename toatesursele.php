<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă o nouă sursă
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $putere_sursa = $_POST['putere_sursa'];
    $sistem_de_racire = $_POST['sistem_de_racire'];
    $certificare = $_POST['certificare'];

    $sql = "INSERT INTO surse (name, putere_sursa, sistem_de_racire, certificare) VALUES ('$name', '$putere_sursa', '$sistem_de_racire', '$certificare')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatesursele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge o sursă
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM surse WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toatesursele.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate sursele din baza de date
$sql = "SELECT * FROM surse";
$result = $conn->query($sql);

?>



<!-- Formular pentru adăugare sursă -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toatesursele.php" method="post">
                <label for="name">Nume sursă:</label>
                <input type="text" id="name" name="name" required>
                <label for="putere_sursa">Putere sursă:</label>
                <input type="text" id="putere_sursa" name="putere_sursa" required>
                <label for="sistem_de_racire">Sistem de răcire:</label>
                <input type="text" id="sistem_de_racire" name="sistem_de_racire" required>
                <label for="certificare">Certificare:</label>
                <input type="text" id="certificare" name="certificare" required>
                <button type="submit" name="add" class="button primary">Adaugă sursă</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru surse -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Putere sursă</th>
      <th>Sistem de răcire</th>
      <th>Certificare</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['putere_sursa']); ?></td>
      <td><?php echo htmlspecialchars($row['sistem_de_racire']); ?></td>
      <td><?php echo htmlspecialchars($row['certificare']); ?></td>
      <td>
        <a href="editare_surse.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toatesursele.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
