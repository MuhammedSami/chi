<?php

use PHPUnit\Framework\TestCase;

/**
 * @author  Muhammed Sami
 * @package ${NAMESPACE}
 */
final class Test extends TestCase
{
    public function test__it_can_test()
    {
        echo '<pre>';
        var_dump('test');
        echo '</pre>';
        exit;
    }
}
