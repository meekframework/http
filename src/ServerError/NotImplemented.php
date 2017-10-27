<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class NotImplemented extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(501, 'Not Implemented', $headers);
    }
}
