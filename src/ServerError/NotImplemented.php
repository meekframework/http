<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '501 Not Implemented' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.6.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class NotImplemented extends ServerError
{
    /**
     * Construct a new 'Not Implemented' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(501, 'Not Implemented', $headers);
    }
}
