<?php

require_once('Character.php');

class Wizard extends Character
{
    public function __construct()
    {
        parent::__construct(health: 28, physicalDamages: 5, magicalDamages: 10);
    }

    public function getMagicalDamages(): float
    {
        if (chance(10)) {
            echo "{$this} inflige des dégats magiques critiques !".PHP_EOL;
            return $this->magicalDamages * 2;
        }
        return $this->magicalDamages;
    }

    public function takesDamages(float $physicalDamages, float $magicalDamages): void
    {
        if (chance(10)) {
            echo "{$this} subit moins de dégats grâce à la chance...".PHP_EOL;
            parent::takesDamages($physicalDamages * 0.9, $magicalDamages * 0.9);
        } else {
            parent::takesDamages($physicalDamages, $magicalDamages);
        }
    }

    public function __toString()
    {
        return "Le Sorcier";
    }
}
