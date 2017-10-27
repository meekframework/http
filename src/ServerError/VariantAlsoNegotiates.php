<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use Meek\Http\ServerError;

class VariantAlsoNegotiates extends ServerError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(506, 'Variant Also Negotiates', $headers);
    }
}
