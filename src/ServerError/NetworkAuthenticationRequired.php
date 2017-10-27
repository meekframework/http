<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class NetworkAuthenticationRequired extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(511, 'Network Authentication Required', $headers);
    }
}
