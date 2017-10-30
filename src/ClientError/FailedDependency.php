<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

/**
 * Exception modeling the '424 Failed Dependency' HTTP status response.
 *
 * @see https://tools.ietf.org/html/rfc4918#section-11.4
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2016 Nathan Bishop
 * @license The MIT license.
 */
class FailedDependency extends ClientError
{
    /**
     * Construct a new 'Failed Dependency' exception.
     *
     * @param string[][] $headers Additional headers associated with the exception.
     */
    public function __construct(array $headers = [])
    {
        parent::__construct(424, 'Failed Dependency', $headers);
    }
}
