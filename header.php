<nav>
  <a href="index.php">Acasa</a>
  <a href="meniu.php">Vezi meniul</a>
  <a href="despre.php">Despre Noi</a>
  <a href="programare.php">Programare</a>
  <a href="contact.php">Contact</a>

  <?php if (isset($_SESSION['nume']) && $_SESSION['nume'] === 'admin'): ?>
    <a href="programari_admin.php">Vezi programari</a>
  <?php endif; ?>
  
  <!-- Pt creare cont -->
  <?php if (!isset($_SESSION['nume'])): ?>
    <a href="login.php">Conectare</a>
    <a href="register.php">Creeaza cont</a>
  <?php else: ?>
    <a href="logout.php">Iesire din cont</a>
  <?php endif; ?>
  
  <!-- Pt stergere cont -->
  <?php if (isset($_SESSION['utilizator'])): ?>
    <a href="sterge_cont.php" onclick="return confirm('Sigur vrei sa stergi contul? Aceasta acțiune este ireversibila!');">
        Sterge contul
    </a>
<?php endif; ?>
  
</nav>
