<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '507 Insufficient Storage' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc4918#section-11.5
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class InsufficientStorage extends ServerError
{
    /**
     * Construct a new 'Insufficient Storage' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(507, 'Insufficient Storage', $headers);
    }
}
