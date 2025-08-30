<!--
<form id="form-cos" action="cos.php" method="POST" style="display:none;">
  <input type="hidden" name="cos_json" id="cos_json" />
</form>

<?php
//Dacă nu a fost trimis nimic, afiseaza mesaj
if (!isset($_POST['cos_json'])) {
    echo "Cosul este gol.";
    exit;
}

$cos = json_decode($_POST['cos_json'], true);

$preturi = [
    "Apa plata" => 3.5,
    "Pizza margherita" => 25,
    "Snitel de pui" => 20,
];

//Suma totala generata
$sumaTotala = 0;

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8" />
    <title>Cosul tau de cumparaturi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
        }
        th, td {
            padding: 10px 20px;
            border: 1px solid #333;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Cosul tau de cumparaturi</h1>
    <table>
        <thead>
            <tr>
                <th>Nume produs</th>
                <th>Valoare produs (RON)</th>
                <th>Cantitate</th>
                <th>Suma totala (RON)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cos as $item): 
                $nume = $item['nume'];
                $cantitate = intval($item['cantitate']);
                $valoare = isset($preturi[$nume]) ? $preturi[$nume] : 0;
                $totalProdus = $valoare * $cantitate;
                $sumaTotala += $totalProdus;
            ?>
            <tr>
                <td><?= htmlspecialchars($nume) ?></td>
                <td><?= number_format($valoare, 2) ?></td>
                <td><?= $cantitate ?></td>
                <td><?= number_format($totalProdus, 2) ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3">Total general</th>
                <th><?= number_format($sumaTotala, 2) ?></th>
            </tr>
        </tbody>
    </table>
</body>
</html>

-->