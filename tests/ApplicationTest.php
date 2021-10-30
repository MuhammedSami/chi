<?php
namespace App\Test;

use App\Core\Application;
use App\Core\Request;
use App\Core\Router;
use PHPUnit\Framework\TestCase;

/**
 * @author  Muhammed Sami
 * @package ${NAMESPACE}
 */
class ApplicationTest extends TestCase
{
    public function setUp() :void
    {
        new \App\Core\Application(dirname(__DIR__));
    }
}
