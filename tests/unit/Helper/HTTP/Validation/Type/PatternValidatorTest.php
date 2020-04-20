<?php
namespace Helper\HTTP\Validation\Type;

use App\Helper\HTTP\Route\Route;
use App\Helper\HTTP\Validation\Type\PatternValidator;
use UnitTester;

class PatternValidatorTest extends \Codeception\Test\Unit
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
     * @group validation
     * @group validation-type
     * @group validation-type-pattern
     * @group validation-type-pattern-invalid
     */
    public function testIsInValid(){

        $route = new Route();
        $validator = new PatternValidator();
        $validator->setRoute($route);

        $this->assertFalse($validator->isValid());

    }


    /**
     * @group validation
     * @group validation-type
     * @group validation-type-pattern
     * @group validation-type-pattern-is-valid
     */
    public function testIsValid(){

        $route = new Route();
        $route->setPattern('/');
        $validator = new PatternValidator();
        $validator->setRoute($route);

        $this->assertTrue($validator->isValid());

    }


}