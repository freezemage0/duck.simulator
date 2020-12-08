<?php


namespace Freezemage\DuckSimulator;


use ArrayObject;
use Freezemage\DuckSimulator\Action\ActionInterface;


class ActionPool {
    /** @var ActionInterface[] $pool */
    private $pool;

    public function __construct() {
        $this->pool = new ArrayObject();
    }

    public function add(ActionInterface $action) {
        $this->pool->append($action);
    }

    public function getRandom(): ActionInterface {
        $offset = rand(0, $this->pool->count() - 1);
        return $this->pool->offsetGet($offset);
    }
}