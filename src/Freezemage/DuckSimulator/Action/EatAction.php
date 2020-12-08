<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\Debug;
use Freezemage\DuckSimulator\Behaviour\EatingInterface;
use Freezemage\DuckSimulator\Contract\EatableInterface;
use Freezemage\DuckSimulator\Entity\Duck;
use Freezemage\DuckSimulator\Entity\Food;


class EatAction extends Action {
    /** @var EatableInterface $eatable */
    protected $eatable;

    public function withEatable(EatableInterface $eatable): EatAction {
        $action = clone $this;
        $action->eatable = $eatable;

        return $action;
    }

    public function execute(Duck $duck): void {
        if ($this->eatable->isEaten()) {
            Debug::output(sprintf('%s tried to eat food, but it was already eaten', $duck->toString()));
            return;
        }

        if (!$this->specification->isSatisfiedBy($duck)) {
            Debug::output(sprintf('%s is not able to eat', $duck->toString()));
            return;
        }

        /** @var EatingInterface $duck */
        $duck->eat($this->eatable);
        Debug::output(sprintf('%s has eaten food.', $duck->toString()));
    }
}