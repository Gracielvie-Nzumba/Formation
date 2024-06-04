<?php
class Devises {
    private $taux = [
        'USD' => [
            'EUR' => 0.85,
            'CDF' => 2850,
        ],
        'EUR' => [
            'USD' => 1.18,
            'CDF' => 2800,
        ],
        'CDF' => [
            'USD' => 0.00035,
            'EUR' => 0.00032,
        ],
    ];

    public function convert($montant, $devises, $change) {
        if (!isset($this->taux[$devises]) || !isset($this->taux[$devises][$change])) {
            return "Conversion non supportée.";
        }

        $taux = $this->taux[$devises][$change];
        $conversionMonetaire = $montant * $taux;

        return $conversionMonetaire;
    }
}

$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $converter = new Devises();
    $montant = isset($_POST['montant']) ? (float)$_POST['montant'] : 0;
    $devises = isset($_POST['devises']) ? $_POST['devises'] : '';
    $change = isset($_POST['change']) ? $_POST['change'] : '';

    $result = $converter->convert($montant, $devises, $change);
    if (is_numeric($result)) {
        $result = "$montant $devises équivaut à $result $change.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taux de change</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <h2 class='font-bold text-green-900 text-2xl'>Convertisseur de devises</h2>
    <form action="" method="post" class="pt-4">
        <label for="montant" class="font-bold">Montant:</label>
        <input id="montant" name="montant" step="0.01" required class="border-2 rounded-md"><br><br>

        <label for="devises">De:</label>
        <select id="devises" name="devises">
            <option value="USD">Dollar américain (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="CDF">Franc congolais (CDF)</option>
        </select><br><br>

        <label for="change">À:</label>
        <select id="change" name="change">
            <option value="USD">Dollar américain (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="CDF">Franc congolais (CDF)</option>
        </select><br><br>

        <button type="submit" class="font-bold text-green-700">Convertir</button>
    </form>
    <a href="http://localhost/php.treading/calculdusalaire/script.php" class="font-bold text-gray-700">Return<a/>

    <?php
    if ($result !== '') {
        echo "<p>Résultat : $result</p>";
    }
    ?>
</body>
</html>
