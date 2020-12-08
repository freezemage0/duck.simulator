<?php


namespace Freezemage\DuckSimulator\Entity;


abstract class Duck implements EntityInterface {
    protected $id;
    protected $color;
    protected $position;
    protected $moveSpeed;
    protected $flyingSpeed;
    protected $alive;

    public function __construct(int $id, string $color, Coordinate $position, ?float $moveSpeed = null, ?float $flyingSpeed = null) {
        $this->id = $id;
        $this->color = $color;
        $this->position = $position;
        $this->moveSpeed = $moveSpeed;
        $this->flyingSpeed = $flyingSpeed;
        $this->alive = true;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function getPosition(): Coordinate {
        return $this->position;
    }

    public function getMoveSpeed(): ?float {
        return $this->moveSpeed;
    }

    public function getFlyingSpeed(): ?float {
        return $this->flyingSpeed;
    }

    abstract public function isAlive(): bool;

    /**
     * Used for debugging purposes.
     *
     * @return string
     */
    public function toString(): string {
        return sprintf(
            '%s #%s [Color: %s, Position: %s.%s, MoveSpeed: %s, FlySpeed: %s]',
            get_called_class(),
            $this->getId(),
            $this->getColor(),
            $this->getPosition()->getX(),
            $this->getPosition()->getY(),
            $this->getMoveSpeed(),
            $this->getFlyingSpeed()
        );
    }
}