<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '505 HTTP Version Not Supported' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.6.6
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class HttpVersionNotSupported extends ServerError
{
    /**
     * Construct a new 'HTTP Version Not Supported' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(505, 'HTTP Version Not Supported', $headers);
    }
}
