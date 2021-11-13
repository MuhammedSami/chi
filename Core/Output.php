<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Output
{
    const ERROR = 'e';
    const SUCCESS = 's';
    const WARNING = 'w';
    const INFO = 'i';

    /**
     * @param $type
     * @param $str
     * @return string
     */
    public static function colorize($type, $str)
    {
        $output = $str;
        switch ($type) {
            case self::ERROR:
                $output = "\033[31m$str \033[0m";
                break;
            case self::WARNING:
                $output = "\033[33m$str \033[0m";
                break;
            case self::SUCCESS:
                $output = "\033[32m$str \033[0m";
                break;
            case self::INFO:
                $output = "\033[36m$str \033[0m";
                break;
            default:
                # code...
                break;
        }

        return $output;
    }
}
