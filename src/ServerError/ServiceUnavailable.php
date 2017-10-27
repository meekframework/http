<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;
use DateTimeInterface;

class ServiceUnavailable extends ServerError
{
    public function __construct(DateTimeInterface $retryAfter = null, array $headers = [])
    {
        if ($retryAfter) {
            // RFC7231, Section 7.1.1: http://tools.ietf.org/html/rfc7231
            $headers = array_merge(['retry-after' => [$retryAfter->format('D, d M Y H:i:s \G\M\T')]]);
        }

        parent::__construct(503, 'Service Unavailable', $headers);
    }
}
