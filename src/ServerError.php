<?php declare(strict_types=1);

namespace Meek\Http;

use InvalidArgumentException;

/**
 * Exception class used for sending HTTP server error response.
 *
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ServerError extends Exception
{
    /**
     * @inheritdoc
     */
    public function assertStatusCodeIsInRange(int $statusCode): void
    {
        if ($statusCode < 500 || $statusCode > 599) {
            throw new InvalidArgumentException('A server error status code ("5xx") was not provided');
        }
    }
}
