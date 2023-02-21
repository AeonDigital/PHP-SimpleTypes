<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;
use AeonDigital\Tools as Tools;





/**
 * Definições para o tipo ``bool``.
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeBool implements iSimpleType
{



    /**
     * Tipo primitivo representado por esta instância.
     *
     * @var PrimitiveType
     */
    public const TYPE = PrimitiveType::BOOL;

    /**
     * Representação em ``string`` do valor que o tipo deve considerar equivalente a ``null``.
     *
     * @var string
     */
    public const NULL_EQUIVALENT = "0";



    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * @return null
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Retornará ``null`` para todos os demais.
     */
    public static function getMin(): null
    {
        return self::MIN;
    }


    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * @return null
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Retornará ``null`` para todos os demais.
     */
    public static function getMax(): null
    {
        return self::MAX;
    }


    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * Por padrão considere que:
     * - bool -> false
     * - int|float|RealType -> 0
     * - DateTime -> 0001-01-01 00:00:00
     * - string -> ""
     * - array -> []
     *
     * @return bool
     */
    public static function getNullEquivalent(): bool
    {
        return (bool)self::NULL_EQUIVALENT;
    }


    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param mixed $v
     * Valor que será verificado.
     *
     * @return bool
     */
    public static function validate(mixed $v): bool
    {
        return (Tools::toBool($v) !== null);
    }


    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return ?bool
     * Retorna o valor equivalente ao originalmente passado ou, caso a conversão não
     * seja possível, retornará ``null``.
     */
    public static function parseIfValidate(mixed $v): ?bool
    {
        return Tools::toBool($v);
    }


    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return ?string
     * Caso não seja possível converter o valor, retornará ``null``.
     */
    public static function toString(mixed $v): ?string
    {
        $n = Tools::toBool($v);
        return (($n === null) ? null : (($n === true) ? "1" : "0"));
    }
}