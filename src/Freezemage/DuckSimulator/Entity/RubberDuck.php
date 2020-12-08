<?php


namespace Freezemage\DuckSimulator\Entity;


use Freezemage\DuckSimulator\Behaviour\AudibleInterface;
use Freezemage\DuckSimulator\Behaviour\MovingInterface;


class RubberDuck extends Duck implements AudibleInterface, MovingInterface {
    public function voice(): string {
        return 'Honk';
    }

    public function move(Direction $direction): void {
        $x = $direction->getHorizontal() * $this->moveSpeed + $this->position->getX();
        $y = $direction->getVertical() * $this->moveSpeed + $this->position->getY();
        $this->position = new Coordinate($x, $y);
    }

    public function isAlive(): bool {
        return false;
    }
}