<?php


namespace Freezemage\DuckSimulator;


use Freezemage\Debug;
use Freezemage\DuckSimulator\Entity\CommonDuck;
use Freezemage\DuckSimulator\Entity\Coordinate;
use Freezemage\DuckSimulator\Entity\HunterDuck;
use Freezemage\DuckSimulator\Entity\RubberDuck;
use Freezemage\DuckSimulator\ParameterModifier\ParameterModifierCollection;
use Freezemage\DuckSimulator\ParameterModifier\ParameterModifierFactory;


class DuckFactory {
    private $id;
    private $parameterModifierFactory;

    public function __construct(ParameterModifierFactory $parameterModifierFactory) {
        $this->parameterModifierFactory = $parameterModifierFactory;
        $this->id = 0;
    }

    public function createRedDuck(Coordinate $position, int $moveSpeed, int $flyingSpeed): CommonDuck {
        return $this->createAliveDuck(
            'red',
            $position,
            $moveSpeed,
            $flyingSpeed,
            $this->parameterModifierFactory->createForRedDuck()
        );
    }

    public function createBlackDuck(Coordinate $position, int $moveSpeed, int $flyingSpeed): CommonDuck {
        return $this->createAliveDuck(
            'black',
            $position,
            $moveSpeed,
            $flyingSpeed,
            $this->parameterModifierFactory->createForBlackDuck()
        );
    }

    public function createCommonDuck(Coordinate $position, int $moveSpeed, int $flyingSpeed): CommonDuck {
        return $this->createAliveDuck(
            'brown',
            $position,
            $moveSpeed,
            $flyingSpeed,
            $this->parameterModifierFactory->createForCommonDuck()
        );
    }

    public function createHunterDuck(Coordinate $position, int $moveSpeed, int $flyingSpeed): HunterDuck {
        $collection = $this->parameterModifierFactory->createForCommonDuck();

        $moveSpeed = $collection->getMoveSpeed()->modify($moveSpeed);
        $flyingSpeed = $collection->getFlyingSpeed()->modify($flyingSpeed);

        return new HunterDuck(
            $this->generateId(),
            'placeholder-color',
            $position,
            $moveSpeed,
            $flyingSpeed
        );
    }

    private function createAliveDuck($color, Coordinate $position, int $moveSpeed, int $flyingSpeed, ParameterModifierCollection $collection): CommonDuck {
        $moveSpeed = $collection->getMoveSpeed()->modify($moveSpeed);
        $flyingSpeed = $collection->getFlyingSpeed()->modify($flyingSpeed);

        return new CommonDuck($this->generateId(), $color, $position, $moveSpeed, $flyingSpeed);
    }

    public function createRubberDuck(string $color, Coordinate $position): RubberDuck {
        return new RubberDuck($this->generateId(), $color, $position, 0, 0);
    }

    private function generateId(): int {
        return ++$this->id;
    }
}