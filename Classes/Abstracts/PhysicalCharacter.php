<?php

require_once("./Classes/Abstracts/Character.php");
require_once("./Traits/HasPhysicalWeapon.php");

abstract class PhysicalCharacter extends Character
{
    use HasPhysicalWeapon;

    public function getPhysicalDamages(): float
    {
        if ($this->hasWeapon()) {
            return $this->weapon->applyBonus($this->physicalDamages);
        }
        return parent::getPhysicalDamages();
    }
}
