<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

/**
 * Exception modeling the '506 Variant Also Negotiates' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc2295#section-8.1
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class VariantAlsoNegotiates extends ServerError
{
    /**
     * Construct a new 'Variant Also Negotiates' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(506, 'Variant Also Negotiates', $headers);
    }
}
