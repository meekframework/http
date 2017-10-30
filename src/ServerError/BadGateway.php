<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '502 Bad Gateway' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.6.3
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class BadGateway extends ServerError
{
    /**
     * Construct a new 'Bad Gateway' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(502, 'Bad Gateway', $headers);
    }
}
