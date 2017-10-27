<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class NetworkAuthenticationRequiredTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $networkAuthenticationRequired = new NetworkAuthenticationRequired();

        $this->assertInstanceOf(ServerError::class, $networkAuthenticationRequired);
    }

    /**
     * @covers \Meek\Http\ServerError\NetworkAuthenticationRequired::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $networkAuthenticationRequired = new NetworkAuthenticationRequired();

        $this->assertEquals(511, $networkAuthenticationRequired->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\NetworkAuthenticationRequired::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $networkAuthenticationRequired = new NetworkAuthenticationRequired();

        $this->assertEquals('Network Authentication Required', $networkAuthenticationRequired->getReasonPhrase());
    }
}
