<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class PayloadTooLarge extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(413, 'Payload Too Large', $headers);
    }
}
