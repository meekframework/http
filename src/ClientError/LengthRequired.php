<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '411 Length Required' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5.10
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class LengthRequired extends ClientError
{
    /**
     * Construct a new 'Length Required' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(411, 'Length Required', $headers);
    }
}
