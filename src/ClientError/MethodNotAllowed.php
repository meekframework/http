<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '405 Method Not Allowed' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7231#section-6.5.5
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class MethodNotAllowed extends ClientError
{
    /**
     * Construct a new 'Method Not Allowed' exception.
     *
     * @param string[] $allowedMethods Supported methods for the target resource.
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $allowedMethods, array $headers = [])
    {
        $allowedMethods = array_map('strtoupper', $allowedMethods);
        $headers = array_merge($headers, ['allow' => $allowedMethods]);

        parent::__construct(405, 'Method Not Allowed', $headers);
    }
}
