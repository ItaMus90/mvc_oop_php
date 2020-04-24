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
        $this->assertEmpty($request->getParameters());
        $this->assertIsArray($request->getParameters());


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

    /**
     * @group request
     * @group request-add-parameter
     */
    public function testAddParameter(){

        $request =  new Request();
        $request->addParameter('id', 123);
        $this->assertSame(123, $request->getParameter('id'));

    }

    /**
     * @group request
     * @group request-set-parameterp
     */
    public function testSetParameters(){

        $request =  new Request();
        $request->setParameters([
            'id' => 123
        ]);
        $this->assertArrayHasKey('id', $request->getParameters());

    }


    /**
     * @group request
     * @group request-get-default-parameter
     */
    public function testGetDefaultParameter(){

        $request =  new Request();

        $this->assertSame(345, $request->getParameter('id', 345));

    }

    /**
     * @group request
     * @group request-get-null-parameter
     */
    public function testGetNullParameter(){

        $request =  new Request();

        $this->assertNull($request->getParameter('id'));

    }

}