<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class HttpVersionNotSupported extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(505, 'HTTP Version Not Supported', $headers);
    }
}
