<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class RequestHeaderFieldsTooLargeTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $requestHeaderFieldsTooLarge = new RequestHeaderFieldsTooLarge();

        $this->assertInstanceOf(ClientError::class, $requestHeaderFieldsTooLarge);
    }

    /**
     * @covers \Meek\Http\ClientError\RequestHeaderFieldsTooLarge::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $requestHeaderFieldsTooLarge = new RequestHeaderFieldsTooLarge();

        $this->assertEquals(431, $requestHeaderFieldsTooLarge->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\RequestHeaderFieldsTooLarge::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $requestHeaderFieldsTooLarge = new RequestHeaderFieldsTooLarge();

        $this->assertEquals('Request Header Fields Too Large', $requestHeaderFieldsTooLarge->getReasonPhrase());
    }
}
