<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class TooManyRequestsTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertInstanceOf(ClientError::class, $tooManyRequests);
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertEquals(429, $tooManyRequests->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertEquals('Too Many Requests', $tooManyRequests->getReasonPhrase());
    }
}
