<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Traits;

use AeonDigital\Tools as Tools;







/**
 * Trait que traz métodos de uso comum para tipos que representam numerais inteiros.
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
trait IntegerMethods
{



    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * @return int
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Retornará ``null`` para todos os demais.
     */
    public static function getMin(): int
    {
        return (int)self::MIN;
    }


    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * @return int
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Retornará ``null`` para todos os demais.
     */
    public static function getMax(): int
    {
        return (int)self::MAX;
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
     * @return int
     */
    public static function getNullEquivalent(): int
    {
        return (int)self::NULL_EQUIVALENT;
    }





    /**
     * Guarda o valor da última tantativa de conversão de valor.
     */
    protected static ?int $lastConvertedValue = null;

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
        self::$lastConvertedValue = Tools::toInt($v);
        return (self::$lastConvertedValue !== null &&
            self::$lastConvertedValue >= self::getMin() &&
            self::$lastConvertedValue <= self::getMax()
        );
    }


    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return ?int
     * Retorna o valor equivalente ao originalmente passado ou, caso a conversão não
     * seja possível, retornará ``null``.
     */
    public static function parseIfValidate(mixed $v): ?int
    {
        if (self::validate($v) === false) {
            return null;
        } else {
            return self::$lastConvertedValue;
        }
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
        $n = self::parseIfValidate($v);
        return (($n === null) ? null : (string)$n);
    }
}