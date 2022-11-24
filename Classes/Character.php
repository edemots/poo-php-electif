<?php

class Character
{
    public function __construct(
        private int $health,
        private int $defense,
        private int $attackDamages,
    ) {
    }

    public function getHealth(): int
    {
        return $this->health;
    }
    
    public function getAttackDamages(): int
    {
        return $this->attackDamages;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function takeDamages(int $damages): void
    {
        $damagesTaken = $damages - $this->defense;

        if ($damagesTaken > $this->health) {
            $this->health = 0;
        } else {
            $this->health -= $damagesTaken;
        }
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }
}
