<?php


namespace Freezemage\DuckSimulator\ParameterModifier;


class ParameterModifierCollection {
    protected $moveSpeed;
    protected $flyingSpeed;

    public function __construct(
        ?ParameterModifierInterface $moveSpeed,
        ?ParameterModifierInterface $flyingSpeed
    ) {
        $this->moveSpeed = $moveSpeed ?? new DefaultModifier();
        $this->flyingSpeed = $flyingSpeed ?? new DefaultModifier();
    }

    public function getMoveSpeed(): ParameterModifierInterface {
        return $this->moveSpeed;
    }

    public function getFlyingSpeed(): ParameterModifierInterface {
        return $this->flyingSpeed;
    }
}