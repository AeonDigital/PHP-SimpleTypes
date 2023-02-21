<?php

declare(strict_types=1);

namespace AeonDigital\SimpleTypes\Types;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\SimpleTypes\Enums\PrimitiveType as PrimitiveType;






/**
 * Definição para ``Unsigned Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
final class TypeLongUnsigned implements iSimpleType
{


    use \AeonDigital\SimpleTypes\Traits\NumericConstants;
    use \AeonDigital\SimpleTypes\Traits\NumericUnsignedConstants;
    use \AeonDigital\SimpleTypes\Traits\IntegerMethods;


    /**
     * **Importante**
     * Em sistemas de 64 bits o limiar mínimo para valores inteiros é de **-9223372036854775808**
     * e o máximo é de **9223372036854775807**. No entanto, a partir destes próprios números
     * o PHP passa a tratá-los como sendo valores de ponto flutuante o que impede comparações
     * com precisão.
     *
     * Desta forma não há como representar corretamente um valor de 64 bits do tipo ``unsigned``
     * que deveria permitir valores entre **0** e **18446744073709551615**. Assim sendo optou-se
     * por manter o limite mínimo em **0** mas o máximo é o mesmo definido para a versão **signed**.
     *
     * Futuramente contamos com alguma forma de possibilitar a correta representação da totalidade
     * do limite para este tipo.
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
    public const MIN = "0";

    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MAX = "9223372036854775806";
}