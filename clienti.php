<?php
//session_start();

include 'header.php';
?>

<!-- Tabel pentru utilizatori -->
<table>
  <thead>
    <tr>
      <th>Utilizatori</th>
      <th>Acțiuni</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Alex123</td>
      <td>
        <a href="editare_clienti.php?client=alex123" class="button small">Editează</a>
        <a href="sterge_client.php?client=alex123v2" class="button alert small">Șterge</a>
      </td>
    </tr>
    <tr>
      <td>Lukasxd1</td>
      <td>
        <a href="editare_clienti.php?client=lukasxd1" class="button small">Editează</a>
        <a href="sterge_client.php?client=lukasxd1v2" class="button alert small">Șterge</a>
      </td>
    </tr>
    <tr>
      <td>AdrianP1984</td>
      <td>
        <a href="editare_clienti.php?client=adrianp1984" class="button small">Editează</a>
        <a href="sterge_client.php?client=adrianv2" class="button alert small">Șterge</a>
      </td>
    </tr>
    <tr>
      <td>boOsT</td>
      <td>
        <a href="editare_clienti.php?client=boost" class="button small">Editează</a>
        <a href="sterge_client.php?client=boostv2" class="button alert small">Șterge</a>
      </td>
    </tr>
    <tr>
      <td>ShadyGuy69</td>
      <td>
        <a href="editare_clienti.php?client=shadyguy69" class="button small">Editează</a>
        <a href="sterge_client.php?client=shadyguy69v2" class="button alert small">Șterge</a>
      </td>
    </tr>
  </tbody>
</table>

<div class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="cell large-12">
    </div>
    <div class="cell large-12">
      <a href="adauga_client.php" class="button large success">Adaugă client</a>
    </div>
  </div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>
