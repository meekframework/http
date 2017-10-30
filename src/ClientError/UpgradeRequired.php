<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '426 Upgrade Required' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc6585#section-4
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class UpgradeRequired extends ClientError
{
    /**
     * Construct a new 'Upgrade Required' exception.
     *
     * @param string[] $protocols A list of supported protocols the client should select from before retrying the request.
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $protocols, array $headers = [])
    {
        $headers = array_merge($headers, [
            'upgrade' => $protocols,
            'connection' => ['upgrade']
        ]);

        parent::__construct(426, 'Upgrade Required', $headers);
    }
}
