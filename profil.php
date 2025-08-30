<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "restaurant");
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT ultima_autentificare FROM utilizatori WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $ultima = $row['ultima_autentificare'];
    if ($ultima) {
        echo "<p><strong>Ultima autentificare:</strong> " . date("d F Y, ora H:i", strtotime($ultima)) . "</p>";
    } else {
        echo "<p>Este prima ta autentificare!</p>";
    }
}
?>
