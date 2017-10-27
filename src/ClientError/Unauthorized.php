<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use Meek\Http\ClientError;

class Unauthorized extends ClientError
{
    public function __construct(string $challenge, array $headers = [])
    {
        $headers = array_merge(['www-authenticate' => [$challenge]]);

        parent::__construct(401, 'Unauthorized', $headers);
    }
}
