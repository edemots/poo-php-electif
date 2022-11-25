<?php

use App\Classes\Abstracts\Character;
use App\Classes\Characters\Soldier;
use App\Classes\Characters\Thief;
use App\Classes\Characters\Wizard;
use App\Classes\Weapons\Cutlass;
use App\Classes\Weapons\RodOfAges;

require_once('./autoload.php');
require_once('./functions.php');

$winners = [
    Thief::class => 0,
    Wizard::class => 0,
    Soldier::class => 0,
];

const GAME_NUMBER = 10000;

$i = 0;
while ($i < GAME_NUMBER) {
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
    $winners[$winner::class]++;

    $i++;
}

var_dump(array_map(fn (int $wins) => ($wins / GAME_NUMBER * 100)."%", $winners));

// echo "Le gagnant est ".lcfirst($winner). " en {$round} round(s)".PHP_EOL;
