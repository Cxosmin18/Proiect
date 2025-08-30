<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Conectare - Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <main class="intro-section">
    <h2>Autentificare</h2>
    <form action="verifica_login.php" method="post" onSubmit="return validateLoginForm()">
      <label for="nume">Nume:</label><br>
      <input type="text" id="nume" name="nume" required><br><br>
      <label for="parola">Parola:</label><br>
      <input type="password" id="parola" name="parola" required><br><br>
      <input type="submit" value="Conectare">
    </form>
  </main>

  <script>
    function validateLoginForm() {
      const nume = document.getElementById("nume").value.trim();
      const parola = document.getElementById("parola").value.trim();

      if (nume.length < 3 || parola.length < 4) {
        alert("Numele trebuie sa aiba minim 3 caractere si parola minim 4.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
