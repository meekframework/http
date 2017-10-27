<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class Gone extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(410, 'Gone', $headers);
    }
}
