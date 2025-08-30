<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <title>Creare cont - Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <main class="intro-section">
    <h2>Creare cont nou</h2>
    <form action="register_process.php" method="post" onsubmit="return validateRegisterForm()">
      <label for="nume">Nume utilizator:</label><br>
      <input type="text" id="nume" name="nume" required><br><br>

      <label for="parola">Parola:</label><br>
      <input type="password" id="parola" name="parola" required><br><br>

      <label for="parola2">Confirma parola:</label><br>
      <input type="password" id="parola2" name="parola2" required><br><br>

      <input type="submit" value="Creează cont">
    </form>

    <p>Ai deja cont? <a href="login.php">Conecteaza-te aici</a>.</p>
  </main>

  <script>
    function validateRegisterForm() {
      const nume = document.getElementById("nume").value.trim();
      const parola = document.getElementById("parola").value.trim();
      const parola2 = document.getElementById("parola2").value.trim();

	  //Validari
      if (nume.length < 3) {
        alert("Numele de utilizator trebuie sa aiba minim 3 caractere.");
        return false;
      }
      if (parola.length < 4) {
        alert("Parola trebuie sa aiba minim 4 caractere.");
        return false;
      }
      if (parola !== parola2) {
        alert("Parolele nu sunt identice.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
