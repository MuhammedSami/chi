<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class ConsoleFormatter
{
    /**
     * @param      $message
     * @param null $color
     */
    public function out($message, $color = null)
    {
        echo Output::colorize($color, $message);
    }

    /**
     *
     */
    public function newline()
    {
        $this->out(PHP_EOL);
    }

    /**
     * @param      $message
     * @param null $color
     */
    public function display($message, $color = null)
    {
        $this->out($message, $color);
        $this->newline();
    }
}
