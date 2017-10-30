<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '508 Loop Detected' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc5842#section-7.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class LoopDetected extends ServerError
{
    /**
     * Construct a new 'Loop Detected' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(508, 'Loop Detected', $headers);
    }
}
