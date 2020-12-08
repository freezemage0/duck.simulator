<?php


namespace Freezemage\DuckSimulator\ParameterModifier;


class ParameterModifierFactory {
    public function createForRedDuck(): ParameterModifierCollection {
        return new ParameterModifierCollection(null, new DefaultModifier(0.2));
    }

    public function createForBlackDuck(): ParameterModifierCollection {
        return new ParameterModifierCollection(new DefaultModifier(0.3), null);
    }

    public function createForCommonDuck(): ParameterModifierCollection {
        return new ParameterModifierCollection(null, null);
    }
}