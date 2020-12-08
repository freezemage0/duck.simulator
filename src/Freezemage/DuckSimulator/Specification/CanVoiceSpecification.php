<?php


namespace Freezemage\DuckSimulator\Specification;


use Freezemage\DuckSimulator\Behaviour\AudibleInterface;
use Freezemage\DuckSimulator\Entity\EntityInterface;


class CanVoiceSpecification implements SpecificationInterface {
    public function isSatisfiedBy(EntityInterface $entity): bool {
        return $entity instanceof AudibleInterface;
    }
}