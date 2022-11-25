<?php

require_once('functions.php');

require_once('./Classes/Characters/Thief.php');
require_once('./Classes/Characters/Wizard.php');
require_once('./Classes/Characters/Soldier.php');
require_once('./Classes/Weapons/Cutlass.php');
require_once('./Classes/Weapons/RodOfAges.php');

$thief = new Thief();
$thief->takesWeapon(new Cutlass());
$wizard = new Wizard();
$wizard->takesWeapon(new RodOfAges());
$soldier = new Soldier();

$characters = [$thief, $wizard, $soldier];
$attackees = $characters;

$finished = false;
$winner = null;
$round = 0;
while (!$finished) {
    $round++;
    
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

        $winner = array_filter(
            [$thief, $wizard, $soldier], 
            function (Character $character) {
                return $character->isAlive();
            }
        );

        if ($finished = count($winner) === 1) {
            break;
        }
    }

    echo PHP_EOL;
}

$winner = array_shift($winner);

echo "Le gagnant est ".lcfirst($winner). " en {$round} round(s)".PHP_EOL;
