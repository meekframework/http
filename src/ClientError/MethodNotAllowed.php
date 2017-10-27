<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class MethodNotAllowed extends ClientError
{
    public function __construct(array $allowedMethods, array $headers = [])
    {
        $allowedMethods = array_map('strtoupper', $allowedMethods);
        $headers = array_merge(['allow' => $allowedMethods]);

        parent::__construct(405, 'Method Not Allowed', $headers);
    }
}
