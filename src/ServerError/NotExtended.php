<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '510 Not Extended' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc2774#section-7
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class NotExtended extends ServerError
{
    /**
     * Construct a new 'Not Extended' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(510, 'Not Extended', $headers);
    }
}
