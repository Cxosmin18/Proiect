<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Despre Noi - Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <link rel="stylesheet" href="css/style.css">
  
  <style>
    body {
      background-image: url('imagini/despreNoiFundal.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>
</head>

<body>
  <header>
    <img src="imagini/logoMonteCarlo_transparent.png" alt="Logo Monte Carlo" class="logo">
    <h1>Monte Carlo</h1>
    <nav>
      <a href="index.php">Acasa</a>
      <a href="meniu.php">Vezi meniul</a>
      <a href="despre.php" class="activ">Despre Noi</a>
	  <a href="programare.php">Programare</a>
      <a href="contact.php">Contact</a>
    </nav>
  </header>

  <main class="intro-section">
    <h2>Cine suntem?</h2>
    <p>
      Restaurantul <strong>Monte Carlo</strong> a fost fondat in anul 2010, din pasiune pentru gastronomie si dorinta de a oferi o experienta culinara memorabila. Situati in inima orasului, localul nostru combina eleganta cu atmosfera calda si prietenoasa.
    </p>

    <h3>Misiunea noastra</h3>
    <p>
      Ne dorim sa oferim clientilor nostri nu doar mancare delicioasa, ci si un loc unde sa se simta ca acasa. Meniul nostru este inspirat atat din bucataria romaneasca traditionala, cat si din cea internationala.
    </p>

    <h3>Ce ne face speciali?</h3>
    <ul>
      <li>Ingrediente proaspete de la furnizori locali</li>
      <li>Retete autentice si gatite cu pasiune</li>
      <li>Personal prietenos si servicii impecabile</li>
      <li>Evenimente tematice si seri muzicale live</li>
    </ul>

    <h3>Va multumim!</h3>
    <p>
      Va asteptam cu drag sa va bucurati de preparatele noastre intr-un ambient relaxant. Monte Carlo - gustul rafinat al ospitalitatii!
    </p>
  </main>

  <footer>
    <p>&copy; 2025 Monte Carlo</p>
  </footer>
</body>
</html>
