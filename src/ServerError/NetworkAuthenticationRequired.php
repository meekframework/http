<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '511 Network Authentication Required' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc6585#section-6
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class NetworkAuthenticationRequired extends ServerError
{
    /**
     * Construct a new 'Network Authentication Required' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(511, 'Network Authentication Required', $headers);
    }
}
