<?php


namespace Freezemage\DuckSimulator\ParameterModifier;


class DefaultModifier implements ParameterModifierInterface {
    protected $multiplier;

    public function __construct($multiplier = 1) {
        $this->multiplier = $multiplier;
    }

    public function modify($parameter) {
        return $parameter * $this->multiplier;
    }
}