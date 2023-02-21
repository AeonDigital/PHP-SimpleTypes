<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;






/**
 * Definição para ``Signed Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeLongSigned implements iSimpleType
{


    use \AeonDigital\SimpleTypes\Traits\NumericConstants;
    use \AeonDigital\SimpleTypes\Traits\NumericSignedConstants;
    use \AeonDigital\SimpleTypes\Traits\IntegerMethods;


    /**
     * **Importante**
     * Em sistemas de 64 bits o limiar mínimo para valores inteiros é de **-9223372036854775808**
     * e o máximo é de **9223372036854775807**. No entanto, a partir destes próprios números
     * o PHP passa a tratá-los como sendo valores de ponto flutuante o que impede comparações
     * com precisão.
     *
     * Para evitar tal comportamento e manter a precisão no uso deste tipo de valor inteiro,
     * optou-se por reduzir em ``1`` cada um dos limites. Com isso, dentro da coleção de possíveis
     * valores, toda comparação realizada será precisa.
     */


    /**
     * Tipo primitivo representado por esta instância.
     *
     * @var PrimitiveType
     */
    public const TYPE = PrimitiveType::LONG;

    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MIN = "-9223372036854775807";

    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MAX = "9223372036854775806";
}