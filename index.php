<?php

require_once('functions.php');

require_once('./Classes/Thief.php');
require_once('./Classes/Wizard.php');
require_once('./Classes/Soldier.php');

$thief = new Thief();
$wizard = new Wizard();
$soldier = new Soldier();

$characters = [$thief, $wizard, $soldier];
$attackees = $characters;

$finished = false;
$winner = null;
$round = 1;
while (!$finished) {
    echo "=== ROUND {$round} ===".PHP_EOL;

    shuffle($characters);
    $charactersToPlay = $characters;
    
    while(count($charactersToPlay) > 0) {
        $attacker = array_shift($charactersToPlay);
        $attackees = array_filter(
            $attackees, 
            fn (Character $character) => get_class($character) !== $attacker::class
        );
        $attackee = array_rand($attackees);
        $attacker->attack($attackees[$attackee]);
        $attackees = $characters;
    }

    $finished = count($winner = array_filter(
        [$thief, $wizard, $soldier], 
        function (Character $character) {
            return $character->isAlive();
        }
    )) === 1;

    $round++;
    echo PHP_EOL;
}

$winner = array_shift($winner);

echo "Le gagnant est ".lcfirst($winner). " en {$round} round(s)".PHP_EOL;
