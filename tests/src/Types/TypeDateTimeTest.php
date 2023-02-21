<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleTypes\Types\TypeDateTime;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;

require_once __DIR__ . "/../../phpunit.php";






class TypeDateTimeTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame(PrimitiveType::DATETIME, TypeDateTime::TYPE);
        $this->assertSame(true, TypeDateTime::IS_CLASS);
        $this->assertSame(false, TypeDateTime::IS_NUMERIC);

        $this->assertSame(null, TypeDateTime::SIGNED);
        $this->assertSame(null, TypeDateTime::UNSIGNED);
        $this->assertSame(null, TypeDateTime::MIN);
        $this->assertSame(null, TypeDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", TypeDateTime::NULL_EQUIVALENT);
    }



    public function test_method_min()
    {
        $this->assertSame(null, TypeDateTime::getMin());
    }

    public function test_method_max()
    {
        $this->assertSame(null, TypeDateTime::getMax());
    }

    public function test_method_nullEquivalent()
    {
        $this->assertSame("0001-01-01 00:00:00", TypeDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
    }



    public function test_method_validate()
    {
        $validateTrue = [
            "1980-05-17 09:45",
            "1980-05-17 09:45:15",
            "1980-05-17",
            new \DateTime("1980-05-17 9:45:15")
        ];
        $validateFalse = [
            null,
            [],
            new StdClass(),
            "17/05/1980"
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(TypeDateTime::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(TypeDateTime::validate($validateFalse[$i]));
        }
    }

    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "1980-05-17 09:45:15",
            "2000-01-01"
        ];
        $resultConvert = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $convertFalse = [
            undefined, null, []
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeDateTime::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->format("Y-m-d H:i:s"), $resultConvert[$i]->format("Y-m-d H:i:s"));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertNull(TypeDateTime::parseIfValidate($convertFalse[$i]));
        }
    }

    public function test_method_toString()
    {
        $originalValues = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $expectedValues = [
            "1980-05-17 09:45:15",
            "2000-01-01 00:00:00"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeDateTime::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }
}