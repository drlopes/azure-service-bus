<?php

namespace Drlopes\AzureServiceBus;

class ServiceBus
{
    public static function fetch(bool $associative = true) : string|array
    {
        // check if the executable file exists in the ./bin/executable folder. if the folder isn't empty, get the first file in the folder
        $files = glob(__DIR__ . '/../bin/executable/*');

        if (empty($files)) {
            throw new \Exception('No executable found');
        }

        // get the first file in the folder
        $executable = $files[0];

        // get the file name without the full path
        $executable = basename($executable);

        try {
            return $associative
                ? json_decode(shell_exec(".\bin\\executable\\$executable"))
                : shell_exec(".\bin\\executable\\$executable");
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}