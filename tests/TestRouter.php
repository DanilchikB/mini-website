<?php 

require_once __DIR__.'/autoload.php';

use PHPUnit\Framework\TestCase;
use Core\Router;
use Core\Route;

class TestRouter extends TestCase
{
    public function testGetVariablesInRequestAndPartsUrl(){
        $class = new ReflectionClass('Core\Router');
        $method = $class->getMethod('getVariablesInRequestAndPartsUrl');
        $method->setAccessible(true);

        $result = $method->invoke(null, '/a/a/b');
        //var_dump($result);
        $this->assertEquals($result['partsUrl'],['a', 'a', 'b']);
    }

    public function testCheckRoute(){
        $class = new ReflectionClass('Core\Router');
        $method = $class->getMethod('CheckRoute');
        $method->setAccessible(true);

        $result = $method->invoke(null, ['a', 'a','b', 'c'], ['a', null, 'b', null]);
        $this->assertTrue($result);

    }

    public function testGetNeededRoute(){
        Router::get('/a', 'a', 'a');
        Router::get('/b', 'b', 'b');

        $route = Router::getNeededRoute('/a');
        //var_dump($route);
        $this->assertNotNull($route);
    }

    


}