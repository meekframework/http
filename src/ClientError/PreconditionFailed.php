<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '412 Precondition Failed' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7232#section-4.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class PreconditionFailed extends ClientError
{
    /**
     * Construct a new 'Precondition Failed' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(411, 'Precondition Failed', $headers);
    }
}
