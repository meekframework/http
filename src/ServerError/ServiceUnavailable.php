<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;
use DateTimeInterface;

/**
 * Exception modeling the '503 Service Unavailable' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.6.4
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ServiceUnavailable extends ServerError
{
    /**
     * Construct a new 'Service Unavailable' exception.
     *
     * @param DateTimeInterface|null $retryAfter If provided, how long the client should wait before retrying the request.
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(DateTimeInterface $retryAfter = null, array $headers = [])
    {
        if ($retryAfter) {
            // RFC7231, Section 7.1.1: http://tools.ietf.org/html/rfc7231
            $headers = array_merge($headers, ['retry-after' => [$retryAfter->format('D, d M Y H:i:s \G\M\T')]]);
        }

        parent::__construct(503, 'Service Unavailable', $headers);
    }
}
