<?php


namespace Freezemage\DuckSimulator\Specification;


use Freezemage\DuckSimulator\Behaviour\MovingInterface;
use Freezemage\DuckSimulator\Entity\EntityInterface;


class CanMoveSpecification implements SpecificationInterface {
    public function isSatisfiedBy(EntityInterface $entity): bool {
        return $entity instanceof MovingInterface;
    }
}