<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class TooManyRequests extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(429, 'Too Many Requests', $headers);
    }
}
