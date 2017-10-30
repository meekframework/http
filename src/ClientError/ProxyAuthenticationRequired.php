<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '407 Proxy Authentication Required' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7235#section-3.2
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class ProxyAuthenticationRequired extends ClientError
{
    /**
     * Construct a new 'Proxy Authentication Required' exception.
     *
     * @param string $challenge The challenge for the target resource.
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(string $challenge, array $headers = [])
    {
        $headers = array_merge($headers, ['proxy-authenticate' => [$challenge]]);
        parent::__construct(407, 'Proxy Authentication Required', $headers);
    }
}
