<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $taux_horaire = 20; 
    $taux_supplementaire = 30; 
    $taux_weekend = 40; 

    
    $heures_normales = isset($_POST['heures_normales']) ? (int)$_POST['heures_normales'] : 0;
    $heures_supplementaires = isset($_POST['heures_supplementaires']) ? (int)$_POST['heures_supplementaires'] : 0;
    $heures_weekend = isset($_POST['heures_weekend']) ? (int)$_POST['heures_weekend'] : 0;

    $salaire_normal = $heures_normales * $taux_horaire;
    $salaire_supplementaire_calcule = $heures_supplementaires * $taux_supplementaire;
    $salaire_weekend_calcule = $heures_weekend * $taux_weekend;

    $salaire_total = $salaire_normal + $salaire_supplementaire_calcule + $salaire_weekend_calcule;
}

$tauxDeChange= "mapage";
echo "<a href='$tauxDeChange'><a/>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul du Salaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="font-bold text-xl text-yellow-900">Calcul du Salaire d'un Employé</h1>
    <form method="post" action="" class="pt-4">
        <label for="heures_normales">Heures normales (lundi au vendredi) :</label>
        <input name="heures_normales" id="heures_normales"  class="rounded-md border-2"><br><br>
        
        <label for="heures_supplementaires">Heures supplémentaires :</label>
        <input name="heures_supplementaires" id="heures_supplementaires"  class="rounded-md border-2"><br><br>
        
        <label for="heures_weekend">Heures le week-end :</label>
        <input name="heures_weekend" id="heures_weekend"  class="rounded-md border-2"><br><br>
        
        
        <button type="submit" value="Calculer le Salaire" class="font-bold text-green-700">Calculer le salaire</button>
    </form>
    <a href="http://localhost/formation/Tpconversion/script.php" class="font-bold text-blue-600">Next<a/>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Résultat:</h2>";
        echo "Salaire des heures normales: $" . number_format($salaire_normal, 2) . "<br>";
        echo "Salaire des heures supplémentaires: $" . number_format($salaire_supplementaire_calcule, 2) . "<br>";
        echo "Salaire des heures le week-end: $" . number_format($salaire_weekend_calcule, 2) . "<br>";
        echo "Salaire total: $" . number_format($salaire_total, 2) . "<br>";
    }
    ?>
</body>
</html>
