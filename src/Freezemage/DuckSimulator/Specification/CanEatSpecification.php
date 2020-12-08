<?php


namespace Freezemage\DuckSimulator\Specification;


use Freezemage\DuckSimulator\Behaviour\EatingInterface;
use Freezemage\DuckSimulator\Entity\EntityInterface;


class CanEatSpecification implements SpecificationInterface {
    public function isSatisfiedBy(EntityInterface $entity): bool {
        return $entity instanceof EatingInterface;
    }
}