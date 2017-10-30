<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception class modeling a '451 Unavailable For Legal Reasons' client error.
 *
 * @link https://tools.ietf.org/html/rfc7725#section-3
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class UnavailableForLegalReasons extends ClientError
{
    /**
     * Constructs a new 'Unavailable For Legal Reasons' exception.
     *
     * @param string $link A URI reference identifying the resource itself.
     * @param string[][] $headers Headers to be sent along with the prepared response.
     */
    public function __construct(string $link, array $headers = [])
    {
        $link = '<' . $link . '>; rel="blocked-by"';
        $headers = array_merge($headers, ['link' => [$link]]);

        parent::__construct(451, 'Unavailable For Legal Reasons', $headers);
    }
}
