<?php


namespace Freezemage\DuckSimulator\Entity;


use Freezemage\DuckSimulator\Behaviour\AudibleInterface;
use Freezemage\DuckSimulator\Behaviour\EatingInterface;
use Freezemage\DuckSimulator\Behaviour\FlyingInterface;
use Freezemage\DuckSimulator\Contract\EatableInterface;
use RuntimeException;


class CommonDuck extends Duck implements FlyingInterface, EatingInterface, AudibleInterface, EatableInterface {
    public function voice(): string {
        return 'Squawk';
    }

    public function eat(EatableInterface $food): void {
        if ($food instanceof Food) {
            $food->consume();
        }
    }

    public function consume(): void {
        $this->alive = false;
    }

    public function fly(Direction $direction): void {
        $moveSpeed = $this->moveSpeed;
        $this->moveSpeed = $this->flyingSpeed;

        $this->move($direction);

        $this->moveSpeed = $moveSpeed;
    }

    public function move(Direction $direction): void {
        $x = $direction->getHorizontal() * $this->moveSpeed + $this->position->getX();
        $y = $direction->getVertical() * $this->moveSpeed + $this->position->getY();
        $this->position = new Coordinate($x, $y);
    }

    public function isAlive(): bool {
        return $this->alive;
    }

    public function isEaten(): bool {
        return !$this->isAlive();
    }
}