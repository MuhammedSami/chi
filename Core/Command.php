<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Command
{
    /**
     * @var array
     */
    protected array $registry;

    protected ConsoleFormatter $formatter;

    const DEFAULT_COMMAND = "list";

    /**
     * @return \App\Core\ConsoleFormatter
     */
    public function getFormatter(): \App\Core\ConsoleFormatter
    {
        return $this->formatter;
    }

    public function __construct()
    {
        $this->formatter = new ConsoleFormatter();
    }

    public function register($name, $callback, $desc = null)
    {
        $this->registry[$name] = ['callback' => $callback, 'description' => $desc];
    }

    public function get($command)
    {
        return $this->registry[$command] ?? null;
    }

    public function run(array $argv)
    {
        $commandName = self::DEFAULT_COMMAND;

        if (isset($argv[1])) {
            $commandName = $argv[1];
        }

        $command = $this->get($commandName);

        if (! $command) {
            return "ERROR: Command $command not found!";
        }

        return call_user_func($command['callback'], $argv);
    }

    public function registerPredefinedCommands()
    {
        $this->register('hello', function (array $argv) {
            $name = isset ($argv[2]) ? $argv[2] : "World";
            $this->formatter->display("Hello $name!!!");
        }, 'Simple hello command');

        $this->register('help', function (array $argv) {
            $this->formatter->display("usage: minicli hello [ your-name ]");
        }, 'Help command for x command');

        $this->register('list', function () {
            foreach ($this->registry as $key => $value) {
                $this->formatter->display($key.' => '.$value['description'], 's');
            }
        }, 'List all commands');

        $this->register('serve', function () {
            exec('cd public; php -S localhost:8080');
        }, 'Serve my application');

        $this->register('create', function (array $argv) {
            if (isset($argv[2]) && $argv[2] == "--help") {
                $this->formatter->display('create --controller ExCont');
            }

            if (isset($argv[2]) && $argv[2] == "--controller" && isset($argv[3])) {
                //@FIXME Create controller
            } else {
                $this->formatter->display('create --controller ExCont', 'w');
            }

            if (isset($argv[2]) && $argv[2] == "--model" && isset($argv[3])) {
                //@FIXME Create model
            } else {
                $this->formatter->display('create --model ExModel', 'w');
            }
        }, 'Create Controller or Model');
    }
}
