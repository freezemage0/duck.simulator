<?php


namespace Freezemage\DuckSimulator\Behaviour;


use Freezemage\DuckSimulator\Contract\EatableInterface;
use Freezemage\DuckSimulator\Entity\Food;


interface EatingInterface {
    public function eat(EatableInterface $food): void;
}