<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '500 Internal Server Error' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.6.1
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class InternalServerError extends ServerError
{
    /**
     * Construct a new 'Internal Server Error' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(500, 'Internal Server Error', $headers);
    }
}
