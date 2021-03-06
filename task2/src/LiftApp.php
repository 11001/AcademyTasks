<?php

namespace App;

require_once '../vendor/autoload.php';

use App\Commands\CurrentState;
use App\Commands\LoadPeople;
use App\Commands\SendLift;
use App\Commands\UnloadPeople;
use App\Exceptions\CommandException;

/**
 * waiting for user commands
 */
while (true) {
    fwrite(STDOUT, '>');
    try {
        parseCommandString(fgets(STDIN));
    } catch (\Exception $e) {
        fwrite(STDERR, $e->getMessage() . PHP_EOL);
    }
}

/**
 * Parse user command
 * @param $command_string
 * @throws CommandException
 */
function parseCommandString($command_string)
{
    $command_array = array_map('trim', explode("&&", trim($command_string)));
    foreach ($command_array as $command) execCommand($command);
}

/**
 * Exec user command. Available commands: state, load, unload, send, exit
 *
 * @param $command
 * @throws CommandException
 */
function execCommand($command)
{
    $command_array = array_map('trim', explode(" ", trim($command)));
    $option = array_slice($command_array, 1);

    switch ($command_array[0]) {
        case 'state':
            CurrentState::exec();
            break;
        case 'load':
            LoadPeople::exec($option);
            break;
        case 'unload':
            UnloadPeople::exec($option);
            break;
        case 'send':
            SendLift::exec($option);
            break;
        default:
            throw new CommandException("Command is invalid");
            break;
        case 'exit':
            exit(0);
    }
}
