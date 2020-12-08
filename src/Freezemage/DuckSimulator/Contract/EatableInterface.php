<?php


namespace Freezemage\DuckSimulator\Contract;


interface EatableInterface {
    public function isEaten(): bool;

    public function consume(): void;
}