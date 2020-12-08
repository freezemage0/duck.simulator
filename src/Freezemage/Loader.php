<?php


namespace Freezemage;


use function spl_autoload_register;
use function spl_autoload_unregister;


class Loader {
    private static $documentRoot;
    private static $enabled;

    public static function isEnabled(): bool {
        return isset(Loader::$enabled) && Loader::$enabled;
    }

    public static function enable(): void {
        if (!Loader::isEnabled()) {
            Loader::$enabled = true;
            spl_autoload_register(array(Loader::class, 'autoLoad'));
        }
    }

    public static function disable(): void {
        if (Loader::isEnabled()) {
            Loader::$enabled = false;
            spl_autoload_unregister(array(Loader::class, 'autoLoad'));
        }
    }

    public static function autoLoad(string $fqn): void {
        $fqn = ltrim($fqn, '\\');
        $fqn = str_replace('\\', DIRECTORY_SEPARATOR, $fqn);

        $absolute = array(Loader::getDocumentRoot(), 'src', $fqn . '.php');
        $absolute = implode(DIRECTORY_SEPARATOR, $absolute);

        if (file_exists($absolute) && is_file($absolute)) {
            /** @noinspection PhpIncludeInspection */
            include $absolute;
        }
    }

    public static function getDocumentRoot(): string {
        if (!isset(Loader::$documentRoot)) {
            Loader::$documentRoot = dirname(__DIR__, 2);
        }

        return Loader::$documentRoot;
    }
}