<?php

require_once("./Classes/Abstracts/Character.php");
require_once("./Traits/HasMagicalWeapon.php");

abstract class MagicalCharacter extends Character
{
    use HasMagicalWeapon;

    public function getMagicalDamages(): float
    {
        if ($this->hasWeapon()) {
            return $this->weapon->applyBonus($this->magicalDamages);
        }
        return parent::getMagicalDamages();
    }
}
