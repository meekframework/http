<?php declare(strict_types=1);

namespace Meek\Http;

use InvalidArgumentException;

/**
 * Exception class modeling the 4xx (Client Error) class of HTTP status codes.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ClientError extends Exception
{
    /**
     * {@inheritdoc}
     */
    public function assertStatusCodeIsInRange(int $statusCode): void
    {
        if ($statusCode < 400 || $statusCode > 499) {
            throw new InvalidArgumentException('A client error status code ("4xx") was not provided');
        }
    }
}
