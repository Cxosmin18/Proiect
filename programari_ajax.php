<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Eroare conexiune: " . $conn->connect_error);
}

$data = $_GET['data'] ?? '';
$ora = $_GET['ora'] ?? '';

$rezultate = [];

if ($data && $ora) {
  $stmt = $conn->prepare("SELECT masa FROM programari WHERE data_programare = ? AND ora_programare = ?");
  $stmt->bind_param("ss", $data, $ora);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $rezultate[] = $row['masa'];
  }
  $stmt->close();
}

header('Content-Type: application/json');
echo json_encode($rezultate);
$conn->close();
