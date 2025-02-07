<?php
//session_start();
include 'db.php'; // Include fișierul pentru conectarea la baza de date
include 'header.php';

// Adaugă un nou procesor
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $frecventa = $_POST['frecventa'];
    $memorie_maxima = $_POST['memorie_maxima'];
    $suport = $_POST['suport'];
    $tip = $_POST['tip'];
    $tip_procesor = $_POST['tip_procesor']; 

    $sql = "INSERT INTO procesoare (name, frecventa, memorie_maxima, suport, tip, tip_procesor) VALUES ('$name', '$frecventa', '$memorie_maxima', '$suport', '$tip', '$tip_procesor')";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateprocesoarele.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

// Șterge un procesor
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM procesoare WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: toateprocesoarele.php");
        exit();
    } else {
        echo "Eroare: " . $conn->error;
    }
}

// Preia toate procesoarele din baza de date
$sql = "SELECT * FROM procesoare";
$result = $conn->query($sql);

?>


<!-- Formular pentru adăugare procesor -->
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-12">
            <form action="toateprocesoarele.php" method="post">
                <label for="name">Nume procesor:</label>
                <input type="text" id="name" name="name" required>
                <label for="frecventa">Frecvență:</label>
                <input type="text" id="frecventa" name="frecventa" required>
                <label for="memorie_maxima">Memorie maximă:</label>
                <input type="text" id="memorie_maxima" name="memorie_maxima" required>
                <label for="suport">Suport:</label>
                <input type="text" id="suport" name="suport" required>
                <label for="tip">Tip:</label>
                <input type="text" id="tip" name="tip" required>
                <label for="tip_procesor">Tip Procesor:</label>
                <select id="tip_procesor" name="tip_procesor" required>
                    <option value="Intel">Intel</option>
                    <option value="AMD">AMD</option>
                </select>
                <button type="submit" name="add" class="button primary">Adaugă procesor</button>
            </form>
        </div>
    </div>
</div>

<!-- Tabel pentru procesoare -->
<table>
  <thead>
    <tr>
      <th>Nume</th>
      <th>Frecvență</th>
      <th>Memorie maximă</th>
      <th>Suport</th>
      <th>Tip</th>
      <th>Tip Procesor</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['frecventa']); ?></td>
      <td><?php echo htmlspecialchars($row['memorie_maxima']); ?></td>
      <td><?php echo htmlspecialchars($row['suport']); ?></td>
      <td><?php echo htmlspecialchars($row['tip']); ?></td>
      <td><?php echo htmlspecialchars($row['tip_procesor']); ?></td>
      <td>
        <a href="editare_procesor.php?id=<?php echo $row['id']; ?>" class="button small">Editează</a>
        <a href="toateprocesoarele.php?delete=<?php echo $row['id']; ?>" class="button alert small">Șterge</a>
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
