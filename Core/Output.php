<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Output
{
    public static function colorize($type, $str)
    {
        $output = $str;
        switch ($type) {
            case 'e': //error
                $output = "\033[31m$str \033[0m";
                break;
            case 's': //success
                $output = "\033[32m$str \033[0m";
                break;
            case 'w': //warning
                $output = "\033[33m$str \033[0m";
                break;
            case 'i': //info
                $output = "\033[36m$str \033[0m";
                break;
            default:
                # code...
                break;
        }

        return $output;
    }
}
