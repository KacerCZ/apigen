<?php

namespace ApiGen\Parser\Tests\Reflection\ReflectionClass;

use ApiGen\Contracts\Parser\Reflection\ConstantReflectionInterface;
use InvalidArgumentException;

class ConstantsTest extends AbstractReflectionClassTestCase
{

    public function testGetConstants()
    {
        $this->assertCount(2, $this->reflectionClass->getConstants());
    }


    public function testGetOwnConstants()
    {
        $this->assertCount(1, $this->reflectionClass->getOwnConstants());
    }


    public function testHasConstant()
    {
        $this->assertFalse($this->reflectionClass->hasConstant('NOT_EXISTING'));
        $this->assertTrue($this->reflectionClass->hasConstant('LEVEL'));
    }


    public function testGetConstant()
    {
        $this->assertInstanceOf(ConstantReflectionInterface::class, $this->reflectionClass->getConstant('LEVEL'));
    }


    public function testHasOwnConstant()
    {
        $this->assertTrue($this->reflectionClass->hasOwnConstant('LEVEL'));
    }


    public function testGetOwnConstant()
    {
        $this->assertInstanceOf(
            'ApiGen\Parser\Reflection\ReflectionConstant',
            $this->reflectionClass->getOwnConstant('LEVEL')
        );
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetOwnConstantNonExisting()
    {
        $this->reflectionClass->getOwnConstant('NON_EXISTING');
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetConstantNonExisting()
    {
        $this->reflectionClass->getConstant('NON_EXISTING');
    }


    public function testGetInheritedConstants()
    {
        $this->assertCount(1, $this->reflectionClass->getInheritedConstants());
    }
}
