<?php

require_once('./Classes/Abstracts/PhysicalWeapon.php');

class Cutlass extends PhysicalWeapon
{
    public function __construct()
    {
        parent::__construct("Le petit couteau", "Le sabre privilégié par les attaquants rapides et furieux.", 30);
    }
}
