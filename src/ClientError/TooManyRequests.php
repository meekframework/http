<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;
use DateTimeInterface;

/**
 * Exception modeling the '429 Too Many Requests' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc6585#section-4
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class TooManyRequests extends ClientError
{
    /**
     * Construct a new 'Too Many Requests' exception.
     *
     * @param DateTimeInterface|null $retryAfter How long before the client should retry the request.
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(DateTimeInterface $retryAfter = null, array $headers = [])
    {
        if ($retryAfter) {
            $retryAfter = [$retryAfter->format('D, d M Y H:i:s \G\M\T')];
            $headers = array_merge($headers, ['retry-after' => $retryAfter]);
        }

        parent::__construct(429, 'Too Many Requests', $headers);
    }
}
