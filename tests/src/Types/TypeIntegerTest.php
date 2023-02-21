<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleTypes\Types\{
    TypeByteSigned,
    TypeShortSigned,
    TypeIntSigned,
    TypeLongSigned,
    TypeByteUnsigned,
    TypeShortUnsigned,
    TypeIntUnsigned,
    TypeLongUnsigned
};
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;

require_once __DIR__ . "/../../phpunit.php";






class TypeIntegerTest extends TestCase
{



    public function test_constants()
    {
        // Signed
        $this->assertSame(PrimitiveType::BYTE, TypeByteSigned::TYPE);
        $this->assertSame(false, TypeByteSigned::IS_CLASS);
        $this->assertSame(true, TypeByteSigned::IS_NUMERIC);

        $this->assertSame(true, TypeByteSigned::SIGNED);
        $this->assertSame(false, TypeByteSigned::UNSIGNED);
        $this->assertSame("-128", TypeByteSigned::MIN);
        $this->assertSame("127", TypeByteSigned::MAX);
        $this->assertSame("0", TypeByteSigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::SHORT, TypeShortSigned::TYPE);
        $this->assertSame(false, TypeShortSigned::IS_CLASS);
        $this->assertSame(true, TypeShortSigned::IS_NUMERIC);

        $this->assertSame(true, TypeShortSigned::SIGNED);
        $this->assertSame(false, TypeShortSigned::UNSIGNED);
        $this->assertSame("-32768", TypeShortSigned::MIN);
        $this->assertSame("32767", TypeShortSigned::MAX);
        $this->assertSame("0", TypeShortSigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::INT, TypeIntSigned::TYPE);
        $this->assertSame(false, TypeIntSigned::IS_CLASS);
        $this->assertSame(true, TypeIntSigned::IS_NUMERIC);

        $this->assertSame(true, TypeIntSigned::SIGNED);
        $this->assertSame(false, TypeIntSigned::UNSIGNED);
        $this->assertSame("-2147483648", TypeIntSigned::MIN);
        $this->assertSame("2147483647", TypeIntSigned::MAX);
        $this->assertSame("0", TypeIntSigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::LONG, TypeLongSigned::TYPE);
        $this->assertSame(false, TypeLongSigned::IS_CLASS);
        $this->assertSame(true, TypeLongSigned::IS_NUMERIC);

        $this->assertSame(true, TypeLongSigned::SIGNED);
        $this->assertSame(false, TypeLongSigned::UNSIGNED);
        $this->assertSame("-9223372036854775807", TypeLongSigned::MIN);
        $this->assertSame("9223372036854775806", TypeLongSigned::MAX);
        $this->assertSame("0", TypeLongSigned::NULL_EQUIVALENT);




        // Unsigned
        $this->assertSame(PrimitiveType::BYTE, TypeByteUnsigned::TYPE);
        $this->assertSame(false, TypeByteUnsigned::IS_CLASS);
        $this->assertSame(true, TypeByteUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeByteUnsigned::SIGNED);
        $this->assertSame(true, TypeByteUnsigned::UNSIGNED);
        $this->assertSame("0", TypeByteUnsigned::MIN);
        $this->assertSame("255", TypeByteUnsigned::MAX);
        $this->assertSame("0", TypeByteUnsigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::SHORT, TypeShortUnsigned::TYPE);
        $this->assertSame(false, TypeShortUnsigned::IS_CLASS);
        $this->assertSame(true, TypeShortUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeShortUnsigned::SIGNED);
        $this->assertSame(true, TypeShortUnsigned::UNSIGNED);
        $this->assertSame("0", TypeShortUnsigned::MIN);
        $this->assertSame("65535", TypeShortUnsigned::MAX);
        $this->assertSame("0", TypeShortUnsigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::INT, TypeIntUnsigned::TYPE);
        $this->assertSame(false, TypeIntUnsigned::IS_CLASS);
        $this->assertSame(true, TypeIntUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeIntUnsigned::SIGNED);
        $this->assertSame(true, TypeIntUnsigned::UNSIGNED);
        $this->assertSame("0", TypeIntUnsigned::MIN);
        $this->assertSame("4294967295", TypeIntUnsigned::MAX);
        $this->assertSame("0", TypeIntUnsigned::NULL_EQUIVALENT);



        $this->assertSame(PrimitiveType::LONG, TypeLongUnsigned::TYPE);
        $this->assertSame(false, TypeLongUnsigned::IS_CLASS);
        $this->assertSame(true, TypeLongUnsigned::IS_NUMERIC);

        $this->assertSame(false, TypeLongUnsigned::SIGNED);
        $this->assertSame(true, TypeLongUnsigned::UNSIGNED);
        $this->assertSame("0", TypeLongUnsigned::MIN);
        $this->assertSame("9223372036854775806", TypeLongUnsigned::MAX);
        $this->assertSame("0", TypeLongUnsigned::NULL_EQUIVALENT);
    }



    public function test_method_min()
    {
        // Signed
        $this->assertSame(-128, TypeByteSigned::getMin());
        $this->assertSame(-32768, TypeShortSigned::getMin());
        $this->assertSame(-2147483648, TypeIntSigned::getMin());
        $this->assertSame(-9223372036854775807, TypeLongSigned::getMin());



        // Unsigned
        $this->assertSame(0, TypeByteUnsigned::getMin());
        $this->assertSame(0, TypeShortUnsigned::getMin());
        $this->assertSame(0, TypeIntUnsigned::getMin());
        $this->assertSame(0, TypeLongUnsigned::getMin());
    }

    public function test_method_max()
    {
        // Signed
        $this->assertSame(127, TypeByteSigned::getMax());
        $this->assertSame(32767, TypeShortSigned::getMax());
        $this->assertSame(2147483647, TypeIntSigned::getMax());
        $this->assertSame(9223372036854775806, TypeLongSigned::getMax());



        // Unsigned
        $this->assertSame(255, TypeByteUnsigned::getMax());
        $this->assertSame(65535, TypeShortUnsigned::getMax());
        $this->assertSame(4294967295, TypeIntUnsigned::getMax());
        $this->assertSame(9223372036854775806, TypeLongUnsigned::getMax());
    }

    public function test_method_nullEquivalent()
    {
        // Signed
        $this->assertSame(0, TypeByteSigned::getNullEquivalent());
        $this->assertSame(0, TypeShortSigned::getNullEquivalent());
        $this->assertSame(0, TypeIntSigned::getNullEquivalent());
        $this->assertSame(0, TypeLongSigned::getNullEquivalent());



        // Unsigned
        $this->assertSame(0, TypeByteUnsigned::getNullEquivalent());
        $this->assertSame(0, TypeShortUnsigned::getNullEquivalent());
        $this->assertSame(0, TypeIntUnsigned::getNullEquivalent());
        $this->assertSame(0, TypeLongUnsigned::getNullEquivalent());
    }



    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127
        ];
        $validateFalse = [
            -129, 128
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(TypeByteSigned::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(TypeByteSigned::validate($validateFalse[$i]));
        }
    }

    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127"
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127
        ];
        $convertFalse = [
            "-129", "128", undefined, null, []
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeByteSigned::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertNull(TypeByteSigned::parseIfValidate($convertFalse[$i]));
        }
    }

    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -129, 128, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeByteSigned::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }
}