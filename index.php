<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <?php include 'header.php'; ?>
  </header>

  <main class="intro-section">
    <h2>Bine ai venit!</h2>
    <p style="margin-bottom: 250px;">
      La restaurantul nostru, una dintre cele mai apreciate din tara, servim cele mai gustoase preparate atat românești cat si internationale!
    </p>
    
    <h3>Programul nostru</h3>
    <ul class="orar">
      <li>Luni - Vineri: 10:00 - 22:00</li>
      <li>Sambata: 12:00 - 23:00</li>
      <li>Duminică: 12:00 - 21:00</li>
    </ul>
	
	<!-- Buna, [nume] -->
    <?php if (isset($_SESSION['utilizator'])): ?>
      <p style="position: absolute; left: 10px; top: 10px; color: yellow; font-weight: bold;">
        Buna, <?= htmlspecialchars($_SESSION['utilizator']) ?>!
      </p>
	  
	<!-- Iesire din cont -->
    <a href="logout.php" style="position: absolute; right: 10px; top: 10px; color: red; font-weight: bold;">
      Iesire din cont
    </a>
	 
	<!-- Conectare in cont -->
    <?php else: ?>
      <a href="login.php" style="position: absolute; right: 10px; top: 10px; color: yellow; font-weight: bold;">
        Conecteaza-te în cont
      </a>
    <?php endif; ?>
	
	
	<!-- Stergere cont -->
	<?php if (isset($_GET['mesaj']) && $_GET['mesaj'] === 'cont_sters'): ?>
    <p style="color: green; font-weight: bold;">Contul tau a fost sters cu succes.</p>
	<?php endif; ?>
    
  </main>

  <footer>
    <p>&copy; 2025 Monte Carlo</p>
  </footer>
</body>
</html>
