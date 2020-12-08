<?php


namespace Freezemage\DuckSimulator\Entity;


class Direction {
    private $horizontal;
    private $vertical;

    public function __construct(int $horizontal, int $vertical) {
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }

    public function getHorizontal(): int {
        return $this->horizontal;
    }

    public function getVertical(): int {
        return $this->vertical;
    }

    public function toString(): string {
        return sprintf('Direction [h: %s, v: %s]', $this->getHorizontal(), $this->getVertical());
    }
}