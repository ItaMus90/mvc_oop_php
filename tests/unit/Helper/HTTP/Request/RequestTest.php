<?php

namespace Helper\HTTP\Request;

use App\Helper\HTTP\Request\Request;
use UnitTester;

class RequestTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }


    /**
     * @group request
     * @group request-defualt
     */
    public function testDefault(){

        $request =  new Request();

        $this->assertEmpty($request->getPath());
        $this->assertEmpty($request->getMethod());

    }

    /**
     * @group request
     * @group request-set-URI-in-constructor
     */
    public function testSetURIInConstructor(){

        $request =  new Request('/');

        $this->assertSame('/', $request->getPath());

    }


    /**
     * @group request
     * @group request-set-URI
     */
    public function testSetURI(){

        $request =  new Request('/');
        $request->setPath('/');
        $this->assertSame('/', $request->getPath());

    }

    /**
     * @group request
     * @group request-set-method-in-constructor
     */
    public function testSetMethodInConstructor(){

        $request =  new Request('/', 'GET');

        $this->assertSame('GET', $request->getMethod());

    }


    /**
     * @group request
     * @group request-set-method
     */
    public function testSetMethod(){

        $request =  new Request();
        $request->setMethod('GET');
        $this->assertSame('GET', $request->getMethod());

    }

    /**
     * @group request
     * @group request-set-method-lowercase
     */
    public function testSetLowerCaseMethod(){

        $request =  new Request();
        $request->setMethod('get');
        $this->assertSame('GET', $request->getMethod());

    }

}