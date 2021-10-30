<?php
namespace App\Test;

use App\Core\Application;
use App\Core\Router;
use PHPUnit\Framework\TestCase;

/**
 * @author  Muhammed Sami
 * @package ${NAMESPACE}
 */
class RouterTest extends ApplicationTest
{
    public function test_get_page_result_with_callback()
    {
        $_SERVER['REQUEST_URI'] = '/test1';
        $_SERVER['REQUEST_METHOD'] = 'get';

        Application::$app->router->get('/test1', function () {
            return "test1";
        });

        $this->assertEquals('test1', Application::$app->router->resolve());
    }

    public function test_not_found_page()
    {
        $_SERVER['REQUEST_URI'] = '/test1123';
        $_SERVER['REQUEST_METHOD'] = 'get';

        $this->assertStringContainsString('NOT FOUND', Application::$app->router->resolve());
    }
}
