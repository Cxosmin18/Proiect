<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $conn->real_escape_string($_POST['nume']);
    $parola = $conn->real_escape_string($_POST['parola']);

    if (strlen($nume) < 3 || strlen($parola) < 4) {
        echo "Numele trebuie sa aiba minim 3 caractere si parola minim 4.";
        exit();
    }

    //Verifica daca ut. exista deja
    $stmt = $conn->prepare("SELECT id FROM utilizatori WHERE nume = ?");
    $stmt->bind_param("s", $nume);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Acest nume de utilizator exista deja. Alege altul.";
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    //Insert ut.
    $stmt = $conn->prepare("INSERT INTO utilizatori (nume, parola) VALUES (?, ?)");
    $stmt->bind_param("ss", $nume, $parola);
    
    if ($stmt->execute()) {
        echo "Contul a fost creat cu succes. <a href='login.php'>Conectează-te aici</a>.";
    } else {
        echo "Eroare la crearea contului: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
