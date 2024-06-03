<?php
require_once("foot.php");

$teamB = new FootballTeam("Real", "Coach Graxe", "4-4-2", 1000000);

echo $teamB->nouveauJoueur(['teamB' => 'Vinicus', 'position' => 'Attaquant']);
echo $teamB->nouveauJoueur(['teamB' => 'Chancel Bemba', 'position' => 'Defenseur']);

$newPlayer = $teamB->getPlayers();
print_r($newPlayer);
?>
