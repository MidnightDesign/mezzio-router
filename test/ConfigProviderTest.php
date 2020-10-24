<?php

/**
 * @see       https://github.com/mezzio/mezzio-router for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-router/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-router/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Router;

use Mezzio\Router\ConfigProvider;
use Mezzio\Router\Middleware;
use Mezzio\Router\RouteCollector;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    public function testProviderProvidesFactoriesForAllMiddleware()
    {
        $provider = new ConfigProvider();
        $config   = $provider();

        $this->assertTrue(isset($config['dependencies']['factories']));
        $factories = $config['dependencies']['factories'];
        $this->assertArrayHasKey(Middleware\DispatchMiddleware::class, $factories);
        $this->assertArrayHasKey(Middleware\ImplicitHeadMiddleware::class, $factories);
        $this->assertArrayHasKey(Middleware\ImplicitOptionsMiddleware::class, $factories);
        $this->assertArrayHasKey(Middleware\MethodNotAllowedMiddleware::class, $factories);
        $this->assertArrayHasKey(Middleware\RouteMiddleware::class, $factories);
        $this->assertArrayHasKey(RouteCollector::class, $factories);
    }
}
