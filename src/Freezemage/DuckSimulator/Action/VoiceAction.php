<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\DuckSimulator\Behaviour\AudibleInterface;
use Freezemage\DuckSimulator\Entity\Duck;


class VoiceAction extends Action {
    public function execute(Duck $duck): void {
        if (!$this->specification->isSatisfiedBy($duck)) {
            return;
        }

        /** @var AudibleInterface $duck */
        echo sprintf('%s made a sound: "%s"', $duck->toString(), $duck->voice()) . PHP_EOL;
    }
}