<?php

require_once('./Classes/Abstracts/MagicalCharacter.php');

class Wizard extends MagicalCharacter
{
    public function __construct()
    {
        parent::__construct(health: 28, physicalDamages: 5, magicalDamages: 10);
    }

    public function getMagicalDamages(): float
    {
        $baseDamages = parent::getMagicalDamages();
        if (chance(10)) {
            echo "{$this} inflige des dégats magiques critiques !".PHP_EOL;
            return $baseDamages * 2;
        }
        return $baseDamages;
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
