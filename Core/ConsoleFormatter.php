<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class ConsoleFormatter
{
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out(PHP_EOL);
    }

    public function display($message)
    {
        $this->newline();
        $this->out($message);
        $this->newline();
        $this->newline();
    }
}
