<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '428 Precondition Required' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc6585#section-3
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class PreconditionRequired extends ClientError
{
    /**
     * Construct a new 'Precondition Required' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(428, 'Precondition Required', $headers);
    }
}
