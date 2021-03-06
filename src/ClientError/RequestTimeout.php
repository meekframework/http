<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '408 Request Timeout' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5.7
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class RequestTimeout extends ClientError
{
    /**
     * Construct a new 'Request Timeout' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        $headers = array_merge($headers, ['connection' => ['close']]);
        parent::__construct(408, 'Request Timeout', $headers);
    }
}
