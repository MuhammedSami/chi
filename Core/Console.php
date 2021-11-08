<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Console
{
    protected Command $registry;

    public function __construct()
    {
        $this->registry = new Command();
        $this->registry->registerPredefinedCommands();
    }

    public function make(array $argv = [])
    {
        $this->registry->run($argv);
    }
}
