<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\DuckSimulator\Specification\SpecificationInterface;


abstract class Action implements ActionInterface {
    protected $specification;

    public function __construct(SpecificationInterface $specification) {
        $this->specification = $specification;
    }
}