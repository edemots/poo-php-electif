<?php

require_once('Character.php');

class Soldier extends Character
{
    public function __construct()
    {
        parent::__construct(health: 32, defense: 80, physicalDamages: 8, magicalDamages: 0);
    }

    public function getPhysicalDamages(): float
    {
        if (chance(10)) {
            echo "{$this} inflige un coup critique !".PHP_EOL;
            return $this->physicalDamages * 2;
        }
        return $this->physicalDamages;
    }

    public function takesDamages(float $physicalDamages, float $magicalDamages): void
    {
        parent::takesDamages($physicalDamages, $magicalDamages * 0.8);
    }

    public function __toString()
    {
        return "Le Soldat";
    }
}
