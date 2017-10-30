<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class UnauthorizedTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $unauthorized = new Unauthorized('Basic realm="MeekFramework"');

        $this->assertInstanceOf(ClientError::class, $unauthorized);
    }

    /**
     * @covers \Meek\Http\ClientError\Unauthorized::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $unauthorized = new Unauthorized('Basic realm="MeekFramework"');

        $this->assertEquals(401, $unauthorized->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\Unauthorized::__construct
     */
    public function testAddsWWWAuthenticateHeader()
    {
        $challenge = 'Basic realm="MeekFramework"';

        $unauthorized = new Unauthorized($challenge);
        $headers = $unauthorized->getHeaders();

        $this->assertArrayHasKey('www-authenticate', $headers);
        $this->assertContains($challenge, $headers['www-authenticate']);
    }

    /**
     * @covers \Meek\Http\ClientError\Unauthorized::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $unauthorized = new Unauthorized('Basic realm="MeekFramework"');

        $this->assertEquals('Unauthorized', $unauthorized->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\Unauthorized::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $challenge = 'Basic realm="MeekFramework"';
        $unauthorized = new Unauthorized($challenge, ['connection' => ['close']]);
        $headers = $unauthorized->getHeaders();

        $this->assertArrayHasKey('www-authenticate', $headers);
        $this->assertArrayHasKey('connection', $headers);
    }
}
