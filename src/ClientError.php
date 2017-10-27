<?php declare(strict_types=1);

namespace Meek\Http;

use InvalidArgumentException;

/**
 * Exception class used for sending HTTP client error response.
 *
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ClientError extends Exception
{
    /**
     * @inheritdoc
     */
    public function assertStatusCodeIsInRange(int $statusCode): void
    {
        if ($statusCode < 400 || $statusCode > 499) {
            throw new InvalidArgumentException('A client error status code ("4xx") was not provided');
        }
    }
}
