<?php declare(strict_types=1);

namespace Meek\Http;

use InvalidArgumentException;

/**
 * Exception class modeling the 5xx (Server Error) class of HTTP status codes.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.6
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ServerError extends Exception
{
    /**
     * {@inheritdoc}
     */
    public function assertStatusCodeIsInRange(int $statusCode): void
    {
        if ($statusCode < 500 || $statusCode > 599) {
            throw new InvalidArgumentException('A server error status code ("5xx") was not provided');
        }
    }
}
