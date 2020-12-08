<?php


require_once __DIR__ . '/src/Freezemage/Loader.php';


use Freezemage\DuckSimulator\Action\ActionFactory;
use Freezemage\DuckSimulator\ActionPool;
use Freezemage\DuckSimulator\DuckFactory;
use Freezemage\DuckSimulator\DuckPool;
use Freezemage\DuckSimulator\Entity\Coordinate;
use Freezemage\DuckSimulator\Entity\Direction;
use Freezemage\DuckSimulator\Entity\Food;
use Freezemage\DuckSimulator\ParameterModifier\ParameterModifierFactory;
use Freezemage\Loader;


Loader::enable();

$parameterModifierFactory = new ParameterModifierFactory();
$duckFactory = new DuckFactory($parameterModifierFactory);
$actionFactory = new ActionFactory();

$pool = new DuckPool();

$mySpecialRedDuck = $duckFactory->createRedDuck(new Coordinate(1, 1), 2, 1);

$pool->add($duckFactory->createBlackDuck(new Coordinate(0, 0), 1, 4));
$pool->add($duckFactory->createBlackDuck(new Coordinate(2, 3), 3, 3));

$pool->add($duckFactory->createRedDuck(new Coordinate(1, 1), 2, 1));
$pool->add($mySpecialRedDuck);

$pool->add($duckFactory->createHunterDuck(new Coordinate(4, 5), 2, 1));

$pool->add($duckFactory->createRubberDuck('cyan', new Coordinate(4, 5)));
$pool->add($duckFactory->createRubberDuck('lime', new Coordinate(-1, -2)));

$actionPool = new ActionPool();
$actionPool->add($actionFactory->createEatAction($mySpecialRedDuck));
$actionPool->add($actionFactory->createMoveAction(new Direction(1, 1)));
$actionPool->add($actionFactory->createMoveAction(new Direction(-1, 1)));
$actionPool->add($actionFactory->createMoveAction(new Direction(0, -1)));
$actionPool->add($actionFactory->createVoiceAction());

$pool->walk($actionPool);
