<?php

namespace Drlopes\AzureServiceBus;

class ServiceBus
{
    private static string $pythonExecutable = 'python';

    public static function fetch(bool $associative = true) : string|array
    {
        try {
            return $associative
                ? json_decode(shell_exec(self::$pythonExecutable . ' ' . __DIR__ . "/../bin/service-bus.py"), true)
                : shell_exec(self::$pythonExecutable . ' ' . __DIR__ . "/../bin/service-bus.py");
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}