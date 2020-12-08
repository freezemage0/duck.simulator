<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\DuckSimulator\Contract\EatableInterface;
use Freezemage\DuckSimulator\Entity\Direction;
use Freezemage\DuckSimulator\Specification\CanEatSpecification;
use Freezemage\DuckSimulator\Specification\CanFlySpecification;
use Freezemage\DuckSimulator\Specification\CanMoveSpecification;
use Freezemage\DuckSimulator\Specification\CanVoiceSpecification;


class ActionFactory {
    public function createEatAction(EatableInterface $eatable): EatAction {
        $action = new EatAction(new CanEatSpecification());
        return $action->withEatable($eatable);
    }

    public function createFlyAction(Direction $direction): FlyAction {
        $action = new FlyAction(new CanFlySpecification());
        return $action->withDirection($direction);
    }

    public function createMoveAction(Direction $direction): MoveAction {
        $action = new MoveAction(new CanMoveSpecification());
        return $action->withDirection($direction);
    }

    public function createVoiceAction(): VoiceAction {
        return new VoiceAction(new CanVoiceSpecification());
    }
}