<?php
// Conectare la DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$message = '';

//Procesare formular
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $masa = intval($_POST['masa']);
  $data_programare = $_POST['data_programare'];
  $ora_programare = $_POST['ora_programare'];

  //Validare
  if ($masa < 1 || $masa > 10) {
    $message = "Masa selectată nu este validă.";
  } elseif (!$data_programare || !$ora_programare) {
    $message = "Te rog completează data și ora programării.";
  } else {
    //Se verifica daca exista deja o programare la acea masa, data si ora
    $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM programari WHERE masa = ? AND data_programare = ? AND ora_programare = ?");
    $stmtCheck->bind_param("iss", $masa, $data_programare, $ora_programare);
    $stmtCheck->execute();
    $stmtCheck->bind_result($count);
    $stmtCheck->fetch();
    $stmtCheck->close();

    if ($count > 0) {
      $message = "Aceasta masa este deja programata la data și ora selectata.";
    } else {
      //Inserare programare noua
      $stmt = $conn->prepare("INSERT INTO programari (masa, data_programare, ora_programare) VALUES (?, ?, ?)");
      $stmt->bind_param("iss", $masa, $data_programare, $ora_programare);

      if ($stmt->execute()) {
        $message = "<span style='color:green;'>Programarea pentru masa $masa a fost salvata cu succes!</span>";
      } else {
        $message = "<span style='color:red;'>Eroare la salvare: " . htmlspecialchars($stmt->error) . "</span>";
      }
      $stmt->close();
    }
  }
}

//Preluare programari existente
$sql = "SELECT masa, data_programare, ora_programare FROM programari";
$result = $conn->query($sql);

$programari = [];

if ($result) {
  while ($row = $result->fetch_assoc()) {
    $programari[] = $row;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <title>Programare Masa - Restaurant Monte Carlo</title>
  <link rel="icon" type="image/png" href="imagini/logoMonteCarlo_transparent.png">
  <style>
    table {
      border-collapse: collapse;
      width: 300px;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      text-align: center;
      padding: 10px;
      font-size: 18px;
    }
    .masa {
      cursor: pointer;
      font-weight: bold;
      color: white;
      border-radius: 6px;
      user-select: none;
    }
    .activ {
      background-color: green;
    }
    .ocupat {
      background-color: red;
    }
    #formular-programare {
      margin-top: 20px;
    }
    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }
    input[type="date"], input[type="time"] {
      padding: 5px;
      font-size: 16px;
      width: 150px;
    }
    button {
      margin-top: 15px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    #btn-inapoi {
      margin-left: 10px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    #mesaj {
      margin-top: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<h1>Programare masa</h1>

<?php if ($message): ?>
  <div id="mesaj"><?= $message ?></div>
<?php endif; ?>

<table>
  <thead>
    <tr>
      <th>Numar masa</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody id="mese-tbody">
    <!-- mesele vor fi generate din JS -->
  </tbody>
</table>

<form id="formular-programare" method="POST" action="">
  <label for="data-programare">Selecteaza data:</label>
  <input type="date" id="data-programare" name="data_programare" min="<?php echo date('Y-m-d'); ?>" required />
  
  <label for="ora-programare">Selecteaza ora:</label>
  <input type="time" id="ora-programare" name="ora_programare" required />
  
  <input type="hidden" id="masa-input" name="masa" value="" />

  <button type="submit" id="confirma-btn" disabled>Confirma programarea</button>
  <button type="button" id="btn-inapoi">Inapoi</button>
</form>

<script>
  //Programarile preluate din PHP
  const programariDinDB = <?= json_encode($programari); ?>;

  const mese = [];
  const tbody = document.getElementById('mese-tbody');
  const btnConfirma = document.getElementById('confirma-btn');
  const btnInapoi = document.getElementById('btn-inapoi');
  let masaSelectata = null;

  for (let i = 1; i <= 10; i++) {
    mese.push({ numar: i, status: 'activ' });
  }

  function marcheazaMeseOcupate(dataSelectata, oraSelectata) {
    mese.forEach(masa => masa.status = 'activ');

    programariDinDB.forEach(prog => {
      if (prog.data_programare === dataSelectata && prog.ora_programare === oraSelectata) {
        const masaOcupata = mese.find(m => m.numar == prog.masa);
        if (masaOcupata) masaOcupata.status = 'ocupat';
      }
    });
  }

  const inputData = document.getElementById('data-programare');
  const inputOra = document.getElementById('ora-programare');

  inputData.addEventListener('change', () => {
    const data = inputData.value;
    const ora = inputOra.value;
    if (data && ora) {
      marcheazaMeseOcupate(data, ora);
      masaSelectata = null;
      btnConfirma.disabled = true;
      document.getElementById('masa-input').value = '';
      afiseazaMese();
    }
  });

  inputOra.addEventListener('change', () => {
    const data = inputData.value;
    const ora = inputOra.value;
    if (data && ora) {
      marcheazaMeseOcupate(data, ora);
      masaSelectata = null;
      btnConfirma.disabled = true;
      document.getElementById('masa-input').value = '';
      afiseazaMese();
    }
  });

  function afiseazaMese() {
    tbody.innerHTML = '';
    mese.forEach(masa => {
      const tr = document.createElement('tr');

      const tdNumar = document.createElement('td');
      tdNumar.textContent = masa.numar;
      tdNumar.classList.add('masa');

      if (masaSelectata === masa.numar) {
        tdNumar.style.backgroundColor = '#ffa500'; // portocaliu
        tdNumar.style.color = 'white';
      } else {
        tdNumar.classList.remove('activ', 'ocupat');
        tdNumar.style.backgroundColor = '';
        tdNumar.style.color = 'white';

        if (masa.status === 'activ') {
          tdNumar.classList.add('activ');
        } else if (masa.status === 'ocupat') {
          tdNumar.classList.add('ocupat');
        }
      }

      tdNumar.onclick = () => {
        if (masa.status === 'ocupat') {
          alert('Masa este deja ocupata.');
          return;
        }
        masaSelectata = masa.numar;
        document.getElementById('masa-input').value = masaSelectata;
        btnConfirma.disabled = false;
        afiseazaMese();
      };

      const tdStatus = document.createElement('td');
      tdStatus.textContent = masa.status.charAt(0).toUpperCase() + masa.status.slice(1);

      tr.appendChild(tdNumar);
      tr.appendChild(tdStatus);
      tbody.appendChild(tr);
    });
  }

  afiseazaMese();

  btnConfirma.onclick = () => {
    const data = inputData.value;
    const ora = inputOra.value;

    if (!masaSelectata) {
      alert('Te rog selecteaza o masa!');
      return;
    }
    if (!data) {
      alert('Te rog selecteaza data programarii!');
      return;
    }
    if (!ora) {
      alert('Te rog selecteaza ora programarii!');
      return;
    }
  };

  btnInapoi.onclick = () => {
    window.location.href = 'index.php';
  };
</script>

</body>
</html>
