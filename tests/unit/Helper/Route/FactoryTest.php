<?php

namespace App\Helper\Route;

use App\Controller\Type;
use UnitTester;


class FactoryTest extends \Codeception\Test\Unit{
    /**
     * @var UnitTester
     */
    protected $tester;
    
    protected function _before(){
    }

    protected function _after(){
    }

    /**
     * @group router
     * @group router-factory-make
     */
    public function testMakeRoute(){

        $factory = new Factory();
        $route = $factory->addRoute([
            'pattern' => '/',
            'controller' => Type\Home::class,
            'method' => ['GET'],
            'action' => 'index'
        ]);

        $this->assertInstanceOf(Route::class, $route);

    }

    /**
     * @group router
     * @group router-factory-make-multiple
     */
    public function testMakeMultiple(){

        $routes = [
            [
                'pattern' => '/',
                'controller' => Type\Home::class,
                'method' => ['GET'],
                'action' => 'index'
            ],
            [
                'pattern' => '/invoice/([0-9]*)',
                'controller' => Type\Invoice::class,
                'method' => ['GET'],
                'action' => 'index'
            ],
            [
                'pattern' => '/invoice/([0-9]*)/edit/([0-9]*)',
                'controller' => Type\Invoice::class,
                'method' => ['GET'],
                'action' => 'index'
            ],

        ];

        $factory = new Factory();
        $results = [];

        foreach ($routes as $route){
            $results[] = $factory->addRoute($route);
        }

        $this->assertEquals(count($routes), count($results));
    }
}