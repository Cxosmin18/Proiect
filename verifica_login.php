<?php
session_start();

//Conectare la baza de date
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
}

$nume = $_POST['nume'];
$parola = $_POST['parola'];

//Verificare daca utilizatorul exista
$stmt = $conn->prepare("SELECT id, nume, parola FROM utilizatori WHERE nume = ?");
$stmt->bind_param("s", $nume);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($user['parola'] === $parola) {
        $_SESSION['utilizator'] = $user['nume'];
        $_SESSION['nume'] = $user['nume'];

		//UPDATE
        $stmtUpdate = $conn->prepare("UPDATE utilizatori SET ultima_autentificare = NOW() WHERE id = ?");
        $stmtUpdate->bind_param("i", $user['id']);
        $stmtUpdate->execute();
        $stmtUpdate->close();

        header("Location: index.php");
        exit();
    } else {
        echo "Parola incorecta.";
    }
} else {
    echo "Utilizatorul nu exista.";
}

$stmt->close();
$conn->close();
?>
