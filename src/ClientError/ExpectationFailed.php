<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '417 Expectation Failed' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5.14
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ExpectationFailed extends ClientError
{
    /**
     * Construct a new 'Expectation Failed' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(417, 'Expectation Failed', $headers);
    }
}
