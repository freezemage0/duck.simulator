<?php


namespace Freezemage\DuckSimulator\Behaviour;


use Freezemage\DuckSimulator\Entity\Direction;


interface MovingInterface {
    public function move(Direction $direction): void;
}