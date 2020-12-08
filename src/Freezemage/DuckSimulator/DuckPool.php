<?php


namespace Freezemage\DuckSimulator;


use Freezemage\Debug;
use Freezemage\DuckSimulator\Entity\CommonDuck;
use Freezemage\DuckSimulator\Entity\Duck;
use SplObjectStorage;


class DuckPool {
    /** @var Duck[] $pool */
    private $pool;

    public function __construct() {
        $this->pool = new SplObjectStorage();
    }

    public function add(Duck $duck) {
        $this->pool->attach($duck);
    }

    public function walk(ActionPool $actionPool) {
        foreach ($this->pool as $duck) {
            $action = $actionPool->getRandom();
            $action->execute($duck);
        }

        foreach ($this->pool as $duck) {
            if ($duck instanceof CommonDuck && !$duck->isAlive()) {
                Debug::output(sprintf('%s is not alive anymore, removing from the pool', $duck->toString()));
                $this->pool->detach($duck);
            }
        }
    }

    public function __debugInfo() {
        $ducks = array();

        foreach ($this->pool as $duck) {
            $ducks[] = $duck->toString();
        }

        return array(
            'count' => $this->pool->count(),
            'ducks' => $ducks
        );
    }


}