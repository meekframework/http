<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class UriTooLong extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(414, 'URI Too Long', $headers);
    }
}
