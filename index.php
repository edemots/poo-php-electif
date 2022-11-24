<?php

require_once('./Classes/Character.php');

$archer = new Character(25, 4, 11);
$soldier = new Character(40, 8, 8);

while ($archer->isAlive() && $soldier->isAlive()) {
    $soldier->takeDamages($archer->getAttackDamages());
    echo "L'archer inflige ".$archer->getAttackDamages() - $soldier->getDefense()." points de dégats au soldat".PHP_EOL;
    
    $archer->takeDamages($soldier->getAttackDamages());
    echo "Le soldat inflige ".$soldier->getAttackDamages() - $archer->getDefense()." points de dégats à l'archer".PHP_EOL;
    
    echo "- archer: {$archer->getHealth()}hp".PHP_EOL;
    echo "- soldier: {$soldier->getHealth()}hp".PHP_EOL;
    echo PHP_EOL;
}

if ($archer->isAlive()) {
    echo "L'archer a gagné !".PHP_EOL;
} else {
    echo "Le soldat a gagné !".PHP_EOL;
}
