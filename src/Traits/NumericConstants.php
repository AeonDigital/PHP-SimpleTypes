<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Traits;









/**
 * Valor das constantes de controle de ``SimpleTypes`` para tipos numéricos.
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
trait NumericConstants
{



    /**
     * Indica quando o tipo é um numero.
     *
     * @var bool
     */
    public const IS_NUMERIC = true;

    /**
     * Representação em ``string`` do valor que o tipo deve considerar equivalente a ``null``.
     *
     * @var string
     */
    public const NULL_EQUIVALENT = "0";
}