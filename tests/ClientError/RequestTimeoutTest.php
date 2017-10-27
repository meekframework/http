<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class RequestTimeoutTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $requestTimeout = new RequestTimeout();

        $this->assertInstanceOf(ClientError::class, $requestTimeout);
    }

    /**
     * @covers \Meek\Http\ClientError\RequestTimeout::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $requestTimeout = new RequestTimeout();

        $this->assertEquals(408, $requestTimeout->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\RequestTimeout::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $requestTimeout = new RequestTimeout();

        $this->assertEquals('Request Timeout', $requestTimeout->getReasonPhrase());
    }
}
