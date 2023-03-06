<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Exception;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function addTwoNumbers()
    {
        $calculator = new StringCalculator();

        $result = $calculator->add('1,2');

        $this->assertEquals(3, $result);
    }

    /**
     * @test
     */
    public function emptyStringShouldReturnZero()
    {
        $calculator = new StringCalculator();

        $result = $calculator->add('');

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function addAnyQuantityOfNumbers()
    {
        $calculator = new StringCalculator(); //preparación

        $result = $calculator->add('1,2,3,4,5'); //ejecución

        $this->assertEquals(15, $result); //validación
    }

    /**
     * @test
     */
    public function lineBreakAsADelimiter()
    {
        $calculator = new StringCalculator(); //preparación

        $result = $calculator->add('1\n2,3'); //ejecución

        $this->assertEquals(6, $result); //validación
    }

    /**
     * @test
     */
    public function delimeterChangeTest()
    {
        $calculator = new StringCalculator(); //preparación

        $result = $calculator->add('//;\n1;2'); //ejecución

        $this->assertEquals(3, $result); //validación
    }

    /**
     * @test
     */
    public function negativeNumberException()
    {
        $calculator = new StringCalculator();

        try{
            $result = $calculator->add('//;\n1;-2');
            $this->fail("Exception not thrown");
        }
        catch(Exception $e){
            $this->assertEquals(343,$e->getCode());
        }
    }

    /**
     * @test
     */
    public function MultipleNegativeNumberException()
    {
        $calculator = new StringCalculator(); //preparación

        try{
            $result = $calculator->add('//;\n1;-2;-3');
            $this->fail("Exception not thrown");
        }
        catch(Exception $e){
            $this->assertEquals(333,$e->getCode());
        }
    }
}
