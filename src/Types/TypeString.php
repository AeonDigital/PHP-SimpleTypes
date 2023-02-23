<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\Tools as Tools;






/**
 * Definições para o tipo ``string``.
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeString implements iSimpleType
{



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
     * @return string
     */
    public static function getNullEquivalent(): string
    {
        return self::NULL_EQUIVALENT;
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
        return (Tools::toString($v) !== null);
    }


    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return ?string
     * Retorna o valor equivalente ao originalmente passado ou, caso a conversão não
     * seja possível, retornará ``null``.
     */
    public static function parseIfValidate(mixed $v): ?string
    {
        return Tools::toString($v);
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
        return Tools::toString($v);
    }
}