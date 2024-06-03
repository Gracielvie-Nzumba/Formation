<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre1 = isset($_POST['number1']) ? (float)$_POST['number1'] : 0;
    $operateur = isset($_POST['operateur']) ? $_POST['operateur'] : '';
    $nombre2 = isset($_POST['number2']) ? (float)$_POST['number2'] : 0;

    switch ($operateur) {
        case '+':
            $result = $nombre1 + $nombre2;
            break;
        case '-':
            $result = $nombre1 - $nombre2;
            break;
        case '*':
            $result = $nombre1 * $nombre2;
            break;
        case '/':
            if ($nombre2 == 0) {
                $result = "Erreur : Division par zéro";
            } else {
                $result = $nombre1 / $nombre2;
            }
            break;
        default:
            $result = "Opérateur invalide";
    }
}
$calculeSalaire= "page.php";
echo "<a href=\'$calculeSalaire\'></a>";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-red-900 text-2xl font-bold">Calculatrice</h1>
    <form method="post" class="pt-4">
        <input name="number1" placeholder="Number1" required >
        <select name="operateur" required>
            <option value="+">add</option>
            <option value="-">soustration</option>
            <option value="*">multple</option>
            <option value="/">division</option>
        </select>
        <input name="number2" placeholder="Number2" required>
        <br/>

        <button type="submit" class="pt-2 font-bold text-green-700">Calculer</button>
    </form>
    <a href="http://localhost/formation/calculesalaire/script.php" class="font-bold text-blue-500">Next<a/>

    <?php
    if (isset($result)) {
        echo "<p>Résultat : $result</p>";
    }
    ?>
</body>
</html>
