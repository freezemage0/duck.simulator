<?php


namespace Freezemage;


class Debug {
    public static function output(string $text): void {
        echo $text . PHP_EOL;
    }
}