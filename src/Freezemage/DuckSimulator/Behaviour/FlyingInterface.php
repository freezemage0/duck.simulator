<?php


namespace Freezemage\DuckSimulator\Behaviour;


use Freezemage\DuckSimulator\Entity\Direction;


interface FlyingInterface extends MovingInterface {
    public function fly(Direction $direction): void;
}