<?php


namespace Freezemage\DuckSimulator\Specification;


use Freezemage\DuckSimulator\Entity\EntityInterface;


interface SpecificationInterface {
    public function isSatisfiedBy(EntityInterface $entity): bool;
}