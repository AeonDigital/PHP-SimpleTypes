<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Traits;

use AeonDigital\Tools as Tools;







/**
 * Valor das constantes de controle de ``SimpleTypes`` para tipos numéricos que
 * NÃO ACEITAM valores negativos (unsigned numbers).
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
trait NumericUnsignedConstants
{



    /**
     * Indica quando trata-se de um valor numérico que ACEITA valores negativos.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?bool
     */
    public const SIGNED = false;

    /**
     * Indica quando trata-se de um valor numérico que NÃO ACEITA valores negativos.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?bool
     */
    public const UNSIGNED = true;
}