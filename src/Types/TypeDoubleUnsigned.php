<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;






/**
 * Definição para ``Unsigned Double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeDoubleUnsigned implements iSimpleType
{


    use \AeonDigital\SimpleTypes\Traits\NumericConstants;
    use \AeonDigital\SimpleTypes\Traits\NumericUnsignedConstants;
    use \AeonDigital\SimpleTypes\Traits\FloatMethods;


    /**
     * **Importante**
     * Em sistemas de 64 bits o limiar mínimo para valores inteiros é de **-9223372036854775808**
     * e o máximo é de **9223372036854775807**. A partir destes próprios números o PHP passa a ter
     * perda de precisão nas operações portanto optou-se a limitar o limiar máximo ao valor no qual
     * as comparações e operações ainda são consistentes. Se precisar usar números maiores considere
     * o uso do tipo ``Real``.
     */


    /**
     * Tipo primitivo representado por esta instância.
     *
     * @var PrimitiveType
     */
    public const TYPE = PrimitiveType::DOUBLE;

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
    public const MAX = "9223372036854775806";
}