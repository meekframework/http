<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '402 Payment Required' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class PaymentRequired extends ClientError
{
    /**
     * Construct a new 'Payment Required' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(402, 'Payment Required', $headers);
    }
}
