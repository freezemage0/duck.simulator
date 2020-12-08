<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\Debug;
use Freezemage\DuckSimulator\Behaviour\MovingInterface;
use Freezemage\DuckSimulator\Entity\Direction;
use Freezemage\DuckSimulator\Entity\Duck;


class MoveAction extends Action {
    protected $direction;

    public function withDirection(Direction $direction): MoveAction {
        $action = clone $this;
        $action->direction = $direction;

        return $action;
    }

    public function execute(Duck $duck): void {
        if (!$this->specification->isSatisfiedBy($duck)) {
            Debug::output(sprintf('%s is not able to move', $duck->toString()));
            return;
        }

        /** @var MovingInterface $duck */
        $duck->move($this->direction);
        Debug::output(sprintf('%s has moved to %s', $duck->toString(), $this->direction->toString()));
    }
}