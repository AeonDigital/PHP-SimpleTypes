<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleTypes\Types\TypeString;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;

require_once __DIR__ . "/../../phpunit.php";






class TypeStringTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame(PrimitiveType::STRING, TypeString::TYPE);
        $this->assertSame(false, TypeString::IS_CLASS);
        $this->assertSame(false, TypeString::IS_NUMERIC);

        $this->assertSame(null, TypeString::SIGNED);
        $this->assertSame(null, TypeString::UNSIGNED);
        $this->assertSame(null, TypeString::MIN);
        $this->assertSame(null, TypeString::MAX);
        $this->assertSame("", TypeString::NULL_EQUIVALENT);
    }



    public function test_method_min()
    {
        $this->assertSame(null, TypeString::getMin());
    }

    public function test_method_max()
    {
        $this->assertSame(null, TypeString::getMax());
    }

    public function test_method_nullEquivalent()
    {
        $this->assertSame("", TypeString::getNullEquivalent());
    }



    public function test_method_validate()
    {
        $validateTrue = [null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $validateFalse = [undefined, new stdClass()];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(TypeString::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(TypeString::validate($validateFalse[$i]));
        }
    }

    public function test_method_parseIfValidate()
    {
        $originalValues = [
            null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", [1, 2, 3]
        ];
        $resultConvert = [
            "", "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", "1 2 3"
        ];
        $convertFalse = [
            undefined, new stdClass()
        ];



        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeString::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertNull(TypeString::parseIfValidate($convertFalse[$i]));
        }
    }

    public function test_method_toString()
    {
        $originalValues = [
            null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", [1, 2, 3]
        ];
        $expectedValues = [
            "", "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", "1 2 3"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeString::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }
}