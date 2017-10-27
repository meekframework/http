<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class InternalServerError extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(500, 'Internal Server Error', $headers);
    }
}
