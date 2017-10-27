<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class UnavailableForLegalReasons extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(451, 'Unavailable For Legal Reasons', $headers);
    }
}
