<?php
namespace App\Test;

use App\Core\Application;
use App\Core\Request;
use PHPUnit\Framework\TestCase;

/**
 * @author  Muhammed Sami
 * @package ${NAMESPACE}
 */
class RequestTest extends ApplicationTest
{
    public function test_it_gives_dashboard_when_no_request_uri_defined()
    {
        $this->assertEquals('/', Application::$app->request->getPath());
    }

    public function test_it_gives_the_requested_uri_when_defined()
    {
        $uri = "/users";
        $_SERVER['REQUEST_URI'] = $uri;

        $this->assertEquals($uri, Application::$app->request->getPath());
    }
}
