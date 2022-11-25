<?php

require_once('./Traits/HasWeapon.php');
require_once('./Classes/Abstracts/MagicalWeapon.php');

trait HasMagicalWeapon
{
    use HasWeapon;

    protected ?MagicalWeapon $weapon = null;

    public function takesWeapon(?MagicalWeapon $weapon)
    {
        echo "{$this} prend ".lcfirst($weapon).PHP_EOL;
        $this->weapon = $weapon;
    }
}
