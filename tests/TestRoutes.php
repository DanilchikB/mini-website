<?php 

spl_autoload_register(function($class) {
    $dir = str_replace('tests', '', __DIR__) . 'src/' .str_replace('\\', '/', $class) . '.php';
    require $dir;

});

use PHPUnit\Framework\TestCase;
use Core\Router;

class TestRouter extends TestCase
{
    public function testPushAndPop()
    {
        
        Router::get('/a', 'a', 'a');
        Router::get('/b', 'b', 'b');
        $route = Router::getNeededRoute('/a');
        $this->assertSame('a', $route->controller);

        $route = Router::getNeededRoute('a');
        $this->assertEmpty($route);
        
    }
}