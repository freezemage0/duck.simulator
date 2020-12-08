<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\Debug;
use Freezemage\DuckSimulator\Behaviour\FlyingInterface;
use Freezemage\DuckSimulator\Entity\Direction;
use Freezemage\DuckSimulator\Entity\Duck;


class FlyAction extends Action {
    protected $direction;

    public function withDirection(Direction $direction): FlyAction {
        $action = clone $this;
        $action->direction = $direction;

        return $action;
    }

    public function execute(Duck $duck): void {
        if (!$this->specification->isSatisfiedBy($duck)) {
            Debug::output(sprintf('%s is not able to fly', $duck->toString()));
            return;
        }

        /** @var FlyingInterface $duck */
        $duck->fly($this->direction);
        Debug::output(sprintf('%s has flown to %s', $duck->toString(), $this->direction->toString()));
    }
}