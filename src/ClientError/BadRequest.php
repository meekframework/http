<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class BadRequest extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(400, 'Bad Request', $headers);
    }
}
