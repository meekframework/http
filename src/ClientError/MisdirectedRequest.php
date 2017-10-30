<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '421 Misdirected Request' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7540#section-9.1.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class MisdirectedRequest extends ClientError
{
    /**
     * Construct a new 'Misdirected Request' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(421, 'Misdirected Request', $headers);
    }
}
