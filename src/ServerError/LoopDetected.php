<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class LoopDetected extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(508, 'Loop Detected', $headers);
    }
}
