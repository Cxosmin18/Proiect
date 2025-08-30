<?php
session_start();

if (!isset($_SESSION['utilizator'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
}

//Obtine numele ut. logat
$nume = $_SESSION['utilizator'];

//Delete ut. din DB
$stmt = $conn->prepare("DELETE FROM utilizatori WHERE nume = ?");
$stmt->bind_param("s", $nume);

if ($stmt->execute()) {
    //Daca stergerea a fost cu succes
    $stmt->close();
    $conn->close();

    session_unset();
    session_destroy();

    header("Location: index.php?mesaj=cont_sters");
    exit();
} else {
    echo "Eroare la stergerea contului: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
