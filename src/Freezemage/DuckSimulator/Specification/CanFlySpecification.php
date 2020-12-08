<?php


namespace Freezemage\DuckSimulator\Specification;


use Freezemage\DuckSimulator\Behaviour\FlyingInterface;
use Freezemage\DuckSimulator\Entity\EntityInterface;


class CanFlySpecification implements SpecificationInterface {
    public function isSatisfiedBy(EntityInterface $entity): bool {
        return $entity instanceof FlyingInterface;
    }
}