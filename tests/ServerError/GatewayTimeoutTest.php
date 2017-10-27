<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class GatewayTimeoutTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $gatewayTimeout = new GatewayTimeout();

        $this->assertInstanceOf(ServerError::class, $gatewayTimeout);
    }

    /**
     * @covers \Meek\Http\ServerError\GatewayTimeout::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $gatewayTimeout = new GatewayTimeout();

        $this->assertEquals(504, $gatewayTimeout->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\GatewayTimeout::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $gatewayTimeout = new GatewayTimeout();

        $this->assertEquals('Gateway Timeout', $gatewayTimeout->getReasonPhrase());
    }
}
