<?php


namespace Freezemage\DuckSimulator\Entity;


use Freezemage\DuckSimulator\Contract\EatableInterface;
use RuntimeException;


class Food implements EatableInterface {
    private $name;
    private $eatable;

    public function __construct(string $name) {
        $this->name = $name;
        $this->eatable = true;
    }

    public function getName(): string {
        return $this->name;
    }

    public function consume(): void {
        $this->eatable = false;
    }

    public function isEaten(): bool {
        return !$this->eatable;
    }
}