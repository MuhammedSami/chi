<?php

namespace App\Core\Traits;

/**
 * @author  Muhammed Sami
 * @package App\Core\Traits
 */
trait Dispatchable
{
    public static function dispatch()
    {
        return (new static(...func_get_args()))->handle();
    }
}
