<?php


namespace Freezemage\DuckSimulator\Entity;


use Freezemage\Debug;
use Freezemage\DuckSimulator\Contract\EatableInterface;


class HunterDuck extends CommonDuck {
    public function eat(EatableInterface $food): void {
        if ($food instanceof CommonDuck) {
            Debug::output(sprintf('%s has eaten %s', $this->toString(), $food->toString()));
        }
        $food->consume();
    }
}