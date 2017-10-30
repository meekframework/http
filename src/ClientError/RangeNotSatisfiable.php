<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '416 Range Not Satisfiable' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc7233#section-4.4
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class RangeNotSatisfiable extends ClientError
{
    /**
     * Construct a new 'Range Not Satisfiable' exception.
     *
     * @param string $contentRange The valid content range of the target resource.
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(string $contentRange, array $headers = [])
    {
        $headers = array_merge($headers, ['content-range' => [$contentRange]]);
        parent::__construct(416, 'Range Not Satisfiable', $headers);
    }
}
