<?php


namespace Freezemage\DuckSimulator\Action;


use Freezemage\DuckSimulator\Entity\Duck;


interface ActionInterface {
    public function execute(Duck $duck): void;
}