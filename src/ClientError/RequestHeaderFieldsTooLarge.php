<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '431 Request Header Fields Too Large' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc6585#section-5
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class RequestHeaderFieldsTooLarge extends ClientError
{
    /**
     * Construct a new 'Request Header Fields Too Large' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(431, 'Request Header Fields Too Large', $headers);
    }
}
