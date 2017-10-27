<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class ImATeapot extends ClientError
{
    public function __construct(array $headers = [])
    {
        parent::__construct(418, 'I\'m A Teapot', $headers);
    }
}
