<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleTypes\Types\{
    TypeFloatSigned,
    TypeDoubleSigned,
    TypeFloatUnsigned,
    TypeDoubleUnsigned
};
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;

require_once __DIR__ . "/../../phpunit.php";






class TypeFloatTest extends TestCase
{



    public function test_constants()
    {
        // Signed
        $this->assertSame(PrimitiveType::FLOAT, TypeFloatSigned::TYPE);
        $this->assertSame(false, TypeFloatSigned::IS_CLASS);
        $this->assertSame(true, TypeFloatSigned::IS_NUMERIC);

        $this->assertSame(true, TypeFloatSigned::SIGNED);
        $this->assertSame(false, TypeFloatSigned::UNSIGNED);
        $this->assertSame("-2147483648", TypeFloatSigned::MIN);
        $this->assertSame("2147483647", TypeFloatSigned::MAX);
        $this->assertSame("0", TypeFloatSigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::DOUBLE, TypeDoubleSigned::TYPE);
        $this->assertSame(false, TypeDoubleSigned::IS_CLASS);
        $this->assertSame(true, TypeDoubleSigned::IS_NUMERIC);

        $this->assertSame(true, TypeDoubleSigned::SIGNED);
        $this->assertSame(false, TypeDoubleSigned::UNSIGNED);
        $this->assertSame("-9223372036854775807", TypeDoubleSigned::MIN);
        $this->assertSame("9223372036854775806", TypeDoubleSigned::MAX);
        $this->assertSame("0", TypeDoubleSigned::NULL_EQUIVALENT);




        // Unsigned
        $this->assertSame(PrimitiveType::FLOAT, TypeFloatUnsigned::TYPE);
        $this->assertSame(false, TypeFloatUnsigned::IS_CLASS);
        $this->assertSame(true, TypeFloatUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeFloatUnsigned::SIGNED);
        $this->assertSame(true, TypeFloatUnsigned::UNSIGNED);
        $this->assertSame("0", TypeFloatUnsigned::MIN);
        $this->assertSame("4294967295", TypeFloatUnsigned::MAX);
        $this->assertSame("0", TypeFloatUnsigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::DOUBLE, TypeDoubleUnsigned::TYPE);
        $this->assertSame(false, TypeDoubleUnsigned::IS_CLASS);
        $this->assertSame(true, TypeDoubleUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeDoubleUnsigned::SIGNED);
        $this->assertSame(true, TypeDoubleUnsigned::UNSIGNED);
        $this->assertSame("0", TypeDoubleUnsigned::MIN);
        $this->assertSame("9223372036854775806", TypeDoubleUnsigned::MAX);
        $this->assertSame("0", TypeDoubleUnsigned::NULL_EQUIVALENT);
    }



    public function test_method_min()
    {
        // Signed
        $this->assertSame(-2147483648.0, TypeFloatSigned::getMin());
        $this->assertSame(-9223372036854775807.0, TypeDoubleSigned::getMin());



        // Unsigned
        $this->assertSame(0.0, TypeFloatUnsigned::getMin());
        $this->assertSame(0.0, TypeDoubleUnsigned::getMin());
    }

    public function test_method_max()
    {
        // Signed
        $this->assertSame(2147483647.0, TypeFloatSigned::getMax());
        $this->assertSame(9223372036854775806.0, TypeDoubleSigned::getMax());



        // Unsigned
        $this->assertSame(4294967295.0, TypeFloatUnsigned::getMax());
        $this->assertSame(9223372036854775806.0, TypeDoubleUnsigned::getMax());
    }

    public function test_method_nullEquivalent()
    {
        // Signed
        $this->assertSame(0.0, TypeFloatSigned::getNullEquivalent());
        $this->assertSame(0.0, TypeDoubleSigned::getNullEquivalent());



        // Unsigned
        $this->assertSame(0.0, TypeFloatUnsigned::getNullEquivalent());
        $this->assertSame(0.0, TypeDoubleUnsigned::getNullEquivalent());
    }



    public function test_method_validate()
    {
        $validateTrue = [
            -2147483648, 10, 0, 56, 2147483647
        ];
        $validateFalse = [
            -2147483649, 2147483648
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(TypeFloatSigned::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(TypeFloatSigned::validate($validateFalse[$i]));
        }
    }

    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-2147483648", "10", "0", "56", "2147483647"
        ];
        $resultConvert = [
            -2147483648.0, 10.0, 0.0, 56.0, 2147483647.0
        ];
        $convertFalse = [
            "-2147483649", "2147483648", undefined, null, []
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeFloatSigned::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertNull(TypeFloatSigned::parseIfValidate($convertFalse[$i]));
        }
    }

    public function test_method_toString()
    {
        $originalValues = [
            -2147483648, 10, 0, 56, 2147483647,
            -2147483649, 2147483648, undefined
        ];
        $expectedValues = [
            "-2147483648", "10", "0", "56", "2147483647",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeFloatSigned::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }
}