<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;






/**
 * Definição para ``Unsigned Float`` (flutuante de 32 bits).
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeFloatUnsigned implements iSimpleType
{


    use \AeonDigital\SimpleTypes\Traits\NumericConstants;
    use \AeonDigital\SimpleTypes\Traits\NumericUnsignedConstants;
    use \AeonDigital\SimpleTypes\Traits\FloatMethods;


    /**
     * Tipo primitivo representado por esta instância.
     *
     * @var PrimitiveType
     */
    public const TYPE = PrimitiveType::FLOAT;

    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MIN = "0";

    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MAX = "4294967295";
}