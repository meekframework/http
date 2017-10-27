<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class BadGatewayTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $badGateway = new BadGateway();

        $this->assertInstanceOf(ServerError::class, $badGateway);
    }

    /**
     * @covers \Meek\Http\ServerError\BadGateway::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $badGateway = new BadGateway();

        $this->assertEquals(502, $badGateway->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\BadGateway::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $badGateway = new BadGateway();

        $this->assertEquals('Bad Gateway', $badGateway->getReasonPhrase());
    }
}
