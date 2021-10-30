<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Response
{
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
}
