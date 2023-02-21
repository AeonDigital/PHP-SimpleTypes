<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;






/**
 * Definição para ``Signed Real`` (numeros reais).
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeRealSigned implements iSimpleType
{


    use \AeonDigital\SimpleTypes\Traits\NumericConstants;
    use \AeonDigital\SimpleTypes\Traits\NumericSignedConstants;
    use \AeonDigital\SimpleTypes\Traits\RealMethods;


    /**
     * Tipo primitivo representado por esta instância.
     *
     * @var PrimitiveType
     */
    public const TYPE = PrimitiveType::REAL;

    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MIN = "-999999999999999999999999999999999999";

    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MAX = "999999999999999999999999999999999999";
}