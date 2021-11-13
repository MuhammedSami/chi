<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Response
{
    /**
     * @param $code
     */
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
}
