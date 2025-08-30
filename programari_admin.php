<?php
session_start();

if (!isset($_SESSION['nume']) || $_SESSION['nume'] !== 'admin') {
  header('Location: login.php');
  exit;
}

//Conectare la baza de date
$conn = new mysqli("localhost", "root", "", "restaurant");
if ($conn->connect_error) {
  die("Conexiune eșuată: " . $conn->connect_error);
}

//Delete programari dupa id
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $id = intval($_POST['id']);
  $conn->query("DELETE FROM programari WHERE id = $id");
}

//Preluam toate programările
$result = $conn->query("SELECT id, masa, data_programare, ora_programare FROM programari ORDER BY data_programare, ora_programare");

?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Programari Active</title>
  <style>
    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background: white;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #ffde59;
    }

    form {
      display: inline;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 20px;
    }

    button {
      background-color: red;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: darkred;
    }
  </style>
</head>
<body>

<h2>Programari Active</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Masa</th>
    <th>Data</th>
    <th>Ora</th>
    <th>Actiune</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['id']) ?></td>
      <td><?= htmlspecialchars($row['masa']) ?></td>
      <td><?= htmlspecialchars($row['data_programare']) ?></td>
      <td><?= htmlspecialchars($row['ora_programare']) ?></td>
      <td>
        <form method="post">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <button type="submit" onclick="return confirm('Sigur vrei sa stergi aceasta programare?')">Sterge</button>
        </form>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<a href="index.php">Inapoi la pagina principala</a>

</body>
</html>

<?php
$conn->close();
?>
