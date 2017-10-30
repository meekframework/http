<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '406 Not Acceptable' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5.6
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class NotAcceptable extends ClientError
{
    /**
     * Construct a new 'Not Acceptable' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(406, 'Not Acceptable', $headers);
    }
}
