<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class RequestHeaderFieldsTooLarge extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(431, 'Request Header Fields Too Large', $headers);
    }
}
