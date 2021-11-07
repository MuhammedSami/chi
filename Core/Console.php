<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Console
{
    protected ConsoleFormatter $formatter;

    /**
     * @return \App\Core\ConsoleFormatter
     */
    public function getFormatter(): \App\Core\ConsoleFormatter
    {
        return $this->formatter;
    }

    protected array $registry;

    public function __construct()
    {
        $this->formatter = new ConsoleFormatter();
    }

    public function runCommand(array $argv)
    {
        $commandName = "help";

        if (isset($argv[1])){
            $commandName = $argv[1];
        }

        $command = $this->getCommand($commandName);
        if (!$command){
            $this->formatter->display("ERROR: Command $command not found!");
            return;
        }

        call_user_func($command, $argv);
    }

    public function registerCommand($name, $callback)
    {
        $this->registry[$name] = $callback;
    }

    public function getCommand($command)
    {
        return $this->registry[$command] ??  null;
    }
}
