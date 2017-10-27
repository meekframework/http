<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class BadGateway extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(502, 'Bad Gateway', $headers);
    }
}
