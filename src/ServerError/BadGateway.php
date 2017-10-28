<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * ...
 *
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class BadGateway extends ServerError
{
    /**
     * Create a new 'bad gateway' exception.
     *
     * @param string[][] $headers Headers to be sent along with the prepared response.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(502, 'Bad Gateway', $headers);
    }
}
