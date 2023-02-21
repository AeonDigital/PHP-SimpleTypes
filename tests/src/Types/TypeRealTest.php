<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleTypes\Types\{
    TypeRealSigned,
    TypeRealUnsigned
};
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;

require_once __DIR__ . "/../../phpunit.php";






class TypeRealTest extends TestCase
{



    public function test_constants()
    {
        // Signed
        $this->assertSame(PrimitiveType::REAL, TypeRealSigned::TYPE);
        $this->assertSame(true, TypeRealSigned::IS_CLASS);
        $this->assertSame(true, TypeRealSigned::IS_NUMERIC);

        $this->assertSame(true, TypeRealSigned::SIGNED);
        $this->assertSame(false, TypeRealSigned::UNSIGNED);
        $this->assertSame("-999999999999999999999999999999999999", TypeRealSigned::MIN);
        $this->assertSame("999999999999999999999999999999999999", TypeRealSigned::MAX);
        $this->assertSame("0", TypeRealSigned::NULL_EQUIVALENT);




        // Unsigned
        $this->assertSame(PrimitiveType::REAL, TypeRealUnsigned::TYPE);
        $this->assertSame(true, TypeRealUnsigned::IS_CLASS);
        $this->assertSame(true, TypeRealUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeRealUnsigned::SIGNED);
        $this->assertSame(true, TypeRealUnsigned::UNSIGNED);
        $this->assertSame("0", TypeRealUnsigned::MIN);
        $this->assertSame("999999999999999999999999999999999999", TypeRealUnsigned::MAX);
        $this->assertSame("0", TypeRealUnsigned::NULL_EQUIVALENT);
    }



    public function test_method_min()
    {
        // Signed
        $this->assertSame("-999999999999999999999999999999999999", TypeRealSigned::getMin()->value());



        // Unsigned
        $this->assertSame("0", TypeRealUnsigned::getMin()->value());
    }

    public function test_method_max()
    {
        // Signed
        $this->assertSame("999999999999999999999999999999999999", TypeRealSigned::getMax()->value());



        // Unsigned
        $this->assertSame("999999999999999999999999999999999999", TypeRealUnsigned::getMax()->value());
    }

    public function test_method_nullEquivalent()
    {
        // Signed
        $this->assertSame("0", TypeRealSigned::getNullEquivalent()->value());



        // Unsigned
        $this->assertSame("0", TypeRealUnsigned::getNullEquivalent()->value());
    }



    public function test_method_validate()
    {
        $validateTrue = [
            "-999999999999999999999999999999999999", 10, 0, 56, "999999999999999999999999999999999999"
        ];
        $validateFalse = [
            "-1000000000000000000000000000000000000", "1000000000000000000000000000000000000"
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(TypeRealSigned::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(TypeRealSigned::validate($validateFalse[$i]));
        }
    }

    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-999999999999999999999999999999999999", "10", "0", "56", "999999999999999999999999999999999999"
        ];
        $resultConvert = [
            "-999999999999999999999999999999999999", "10", "0", "56", "999999999999999999999999999999999999"
        ];
        $convertFalse = [
            "-1000000000000000000000000000000000000", "1000000000000000000000000000000000000", undefined, null, []
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeRealSigned::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertNull(TypeRealSigned::parseIfValidate($convertFalse[$i]));
        }
    }

    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
            undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
            null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeRealSigned::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }
}