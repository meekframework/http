<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class LengthRequired extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(411, 'Length Required', $headers);
    }
}
