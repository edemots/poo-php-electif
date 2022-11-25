<?php

require_once('./Traits/HasWeapon.php');
require_once('./Classes/Abstracts/PhysicalWeapon.php');

trait HasPhysicalWeapon
{
    use HasWeapon;

    protected ?PhysicalWeapon $weapon = null;

    public function takesWeapon(?PhysicalWeapon $weapon)
    {
        echo "{$this} prend ".lcfirst($weapon).PHP_EOL;
        $this->weapon = $weapon;
    }
}
