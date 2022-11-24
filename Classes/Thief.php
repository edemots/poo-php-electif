<?php

require_once('Character.php');

class Thief extends Character
{
    public function __construct()
    {
        parent::__construct(health: 25, defense: 40, physicalDamages: 11, magicalDamages: 4);
    }

    public function getPhysicalDamages(): float
    {
        if (chance(5)) {
            echo "{$this} fait plus de dégats !".PHP_EOL;
            return $this->physicalDamages * 1.2;
        }
        return $this->physicalDamages;
    }

    public function getDefense(): float
    {
        if (chance(10)) {
            echo "{$this} esquive l'attaque !".PHP_EOL;
            return 1;
        }
        return parent::getDefense();
    }

    public function __toString()
    {
        return "Le Voleur";
    }
}
