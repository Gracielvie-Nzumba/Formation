<?php
class FootballTeam {
    private string $name;
    private string $coach;
    private string $players;
    private string $formation;
    private string $salaire;

    public function __construct($name, $coach, $formation, $salaire) {
        $this->name = $name;
        $this->coach = $coach;
        $this->formation = $formation;
        $this->salaire = $salaire;
        $this->players = [];
    }

    public function nouveauJoueur($player) {
        if (count($this->players) < 11) {
            $this->players[] = $player;
            return "Le joueur a été ajouté avec succès.";
        } else {
            return "Impossible d'ajouter plus de joueurs.";
        }
    }

    public function getPlayers() {
        return $this->players;
    }
}

$teamC = new FootballTeam("Madrid", "Sous_Coach Samy", "2-4-4", 100000);

echo $teamC->nouveauJoueur(['name' => 'GloDi', 'position' => 'Attaquant']);
echo $teamC->nouveauJoueur(['name' => 'Bernard', 'position' => 'Defenseur']);

$newPlayer = $teamC->getPlayers();
print_r($newPlayer);
?>
