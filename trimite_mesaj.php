<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

//Conectare
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexiune esuata: " . $conn->connect_error);
}

//Preia datele din POST
$nume = $_POST['nume'] ?? '';
$email = $_POST['email'] ?? '';
$subiect = $_POST['subiect'] ?? '';
$mesaj = $_POST['mesaj'] ?? '';

//Validare
if (!$nume || !$email || !$subiect || !$mesaj) {
  echo "Toate campurile sunt obligatorii!";
  exit;
}

//Inserare in DB
$stmt = $conn->prepare("INSERT INTO mesaje_contact (nume, email, subiect, mesaj) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nume, $email, $subiect, $mesaj);

if ($stmt->execute()) {
  echo "Mesaj trimis cu succes!";
} else {
  echo "Eroare la trimiterea mesajului: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
?>
