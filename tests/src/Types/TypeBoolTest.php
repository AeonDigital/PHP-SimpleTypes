<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleTypes\Types\TypeBool as TypeBool;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;

require_once __DIR__ . "/../../phpunit.php";





class TypeBoolTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame(PrimitiveType::BOOL, TypeBool::TYPE);
        $this->assertSame(false, TypeBool::IS_CLASS);
        $this->assertSame(false, TypeBool::IS_NUMERIC);

        $this->assertSame(null, TypeBool::SIGNED);
        $this->assertSame(null, TypeBool::UNSIGNED);
        $this->assertSame(null, TypeBool::MIN);
        $this->assertSame(null, TypeBool::MAX);
        $this->assertSame("0", TypeBool::NULL_EQUIVALENT);
    }

    public function test_method_min()
    {
        $this->assertSame(null, TypeBool::getMin());
    }

    public function test_method_max()
    {
        $this->assertSame(null, TypeBool::getMax());
    }

    public function test_method_nullEquivalent()
    {
        $this->assertSame(false, TypeBool::getNullEquivalent());
    }

    public function test_method_validate()
    {
        // TypeBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(TypeBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(TypeBool::validate($validateFalse[$i]));
        }
    }

    public function test_method_parseIfValidate()
    {
        // TypeBool
        $originalValues = [
            true, "yes", 1, "1", "on",
            false, "no", 0, "0", "off"
        ];
        $resultConvert = [
            true, true, true, true, true,
            false, false, false, false, false
        ];
        $convertFalse = [
            "", null, undefined
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeBool::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertNull(TypeBool::parseIfValidate($convertFalse[$i]));
        }
    }

    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = TypeBool::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }
}